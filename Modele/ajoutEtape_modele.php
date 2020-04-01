<?php
//on recupère tous les utilisateur qui ne sont pas admin
$requete = "SELECT login,nom,prenom FROM utilisateur where role<>'admin' ORDER BY login;";
$requeteUtilisateur=$dbh -> prepare($requete);
$requeteUtilisateur->execute();

//on verifie que l'utilisateur soit un admin
if($_SESSION["role"]!="admin"){
    header("Location: ../framework/index.php");
    exit();
}

//On récupere l'id du cricuit qui ce trouve soit dans l'url si on vient depuis la bannière ou dans la session si on a deja modifier une étape
if(isset($_GET["id"])||isset( $_SESSION["idCircuit"])){
    if(isset($_GET["id"])){
        $idCircuit=$_GET["id"];
        $_SESSION["idCircuit"]=$idCircuit;
    }else{
        $idCircuit=$_SESSION["idCircuit"];
    }
    $requete = "SELECT nom,typeDocument FROM circuit where id=?;";
    $requeteCircuit = $dbh -> prepare($requete);
    $requeteCircuit -> execute(array($idCircuit));
    $circuit=$requeteCircuit->fetch();
    $requete = "SELECT idEtape FROM listeEtape where idCircuit=?;";
    $requeteListeEtape = $dbh -> prepare($requete);
    $requeteListeEtape -> execute(array($idCircuit)); 
}

//modification d'une étape
if(isset($_POST['modifier'])){
    $requete="select position from etape where id=?";
    $position=$dbh -> prepare($requete);
    $position->execute(array($_POST["modifier"]));
    //enregistrement en session de la position e l'étape a modifier
    $_SESSION["position"]=$position->fetch()["position"];
}

//ajout d'une étape
if(isset($_POST['ajouterEtape'])){
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['personne']) && !empty($_POST['personne'])){
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $personne = filter_var($_POST['personne'], FILTER_SANITIZE_STRING);
        //on regarde si il y a une position enregistré en session 
        if(isset($_SESSION["position"])){
            $position=$_SESSION["position"];
        }else{
            //sinon on lui donne la derniere position +1
            $position=getDernierePosition($idCircuit)+1;

        }
        //on regarde si l'etape existe dans la bd
        $requete = "SELECT id FROM etape where nom=? and personne=? and position=?;";
        $existe=$dbh -> prepare($requete);
        $existe->execute(array($nom,$personne,$position));
        if($existe->rowcount() == null){
            //si elle n'existe pas on l'enregistre
            $requete="INSERT into etape (nom,personne,position) values(?,?,?)";
            $insertion=$dbh -> prepare($requete);
            $insertion->execute(array($nom,$personne,$position));
            //on récupere l'id de létape enregistrée
            $requete = "SELECT id FROM etape where nom=? and personne=? and position=?;";
            $id=$dbh -> prepare($requete);
            $id->execute(array($nom,$personne,$position));
            $idE= $id->fetch()["id"];
        }else{
            // on recuepre son id
            $idE=$existe->fetch()["id"];
        }
        //On regarde si un modificaton a éte demandée (si position existe dans la session)
        if(isset($_SESSION['position'])){
            //On récupere l'id de l'ancienne étape
            $requete="select id from etape join listeetape on etape.id=listeetape.idEtape where position=? and idCircuit=?";
            $id=$dbh -> prepare($requete);
            $id->execute(array($position,$idCircuit));
            $idAncienneE=$id->fetch()["id"];
            //On change l'ancienne par la nouvelle
            $requete="UPDATE listeetape
            SET idEtape =?
            WHERE idCircuit =? and idEtape=?";
            $update=$dbh -> prepare($requete);
            $update->execute(array($idE,$idCircuit,$idAncienneE));
            unset($_SESSION["position"]);
            header("Refresh:0");
        }else{
            //Si aucune modification n'a été dema,ndé nous ajoutons la nouvelle étape a la liste des étapes 
            $requete="INSERT into listeEtape value(?,?)";
            $insertion=$dbh -> prepare($requete);
            $insertion->execute(array($idCircuit,$idE));
            header("Refresh:0");
        }
        
    }
}

//Supression d'ube étape
if(isset($_POST['supprimer'])){
    $requete="DELETE FROM listeetape WHERE idCircuit=? and idEtape=?";
    $suppresion=$dbh -> prepare($requete);
    $suppresion->execute(array($idCircuit,$_POST["supprimer"]));
    header("Refresh:0");
}

//getter pour le nom d'une étape a partir de son id
function getNomEtape($id){
    include("../Controleur/connexionBD.php");
    $requete = "SELECT nom FROM etape where id=?";
    $requeteNomEtape = $dbh -> prepare($requete);
    $requeteNomEtape -> execute(array($id));
    return $requeteNomEtape->fetch()["nom"];
}
//getter pour la position d'une étape a partir de son id
function getPositionEtape($id){
    include("../Controleur/connexionBD.php");
    $requete = "SELECT position FROM etape where id=?";
    $requetePositonEtape = $dbh -> prepare($requete);
    $requetePositonEtape -> execute(array($id));
    return $requetePositonEtape->fetch()["position"];
}
//getter pour la personne agissante d'une étape a partir de son id
function getPersonneEtape($id){
    include("../Controleur/connexionBD.php");
    $requete = "SELECT personne FROM etape where id=?";
    $requetePersonneEtape = $dbh -> prepare($requete);
    $requetePersonneEtape -> execute(array($id));
    $personne=$requetePersonneEtape->fetch()["personne"];
    $requete = "SELECT nom,prenom FROM utilisateur where login=?";
    $requetePersonneEtape = $dbh -> prepare($requete);
    $requetePersonneEtape -> execute(array($personne));
    return $requetePersonneEtape->fetch();
}
//getter pour la position de la dernière étape d'un circuit
function getDernierePosition($id){
    include("../Controleur/connexionBD.php");
    $requete = "SELECT max(position) FROM etape join listeetape on etape.id=listeetape.idEtape WHERE listeetape.idCircuit=?";
    $requetePositonEtape = $dbh -> prepare($requete);
    $requetePositonEtape -> execute(array($id));
    $position=$requetePositonEtape->fetch()["max(position)"];
    if($position==null){
        $position=0;
    }
    return $position;
}