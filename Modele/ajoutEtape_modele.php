<?php
$requete = "SELECT login,nom,prenom FROM utilisateur where role<>'admin' ORDER BY login;";
$requeteUtilisateur=$dbh -> prepare($requete);
$requeteUtilisateur->execute();

$requete = "SELECT * FROM etape ORDER BY nom;";
$requeteEtape = $dbh -> prepare($requete);
$requeteEtape -> execute();

if($_SESSION["role"]!="admin"){
    header("Location: ../framework/index.php");
    exit();
}

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

if(isset($_POST['modifier'])){
    $requete="select position from etape where id=?";
    $position=$dbh -> prepare($requete);
    $position->execute(array($_POST["modifier"]));
    $_SESSION["position"]=$position->fetch()["position"];
}

if(isset($_POST['ajouterEtape'])){
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['personne']) && !empty($_POST['personne'])){
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $personne = filter_var($_POST['personne'], FILTER_SANITIZE_STRING);
        if(isset($_SESSION["position"])){
            $position=$_SESSION["position"];
        }else{
            $position=getDernierePosition($idCircuit)+1;

        }
        $requete = "SELECT id FROM etape where nom=? and personne=? and position=?;";
        $existe=$dbh -> prepare($requete);
        $existe->execute(array($nom,$personne,$position));
        if($existe->rowcount() == null){
            $requete="INSERT into etape (nom,personne,position) values(?,?,?)";
            $insertion=$dbh -> prepare($requete);
            $insertion->execute(array($nom,$personne,$position));
            $requete = "SELECT id FROM etape where nom=? and personne=? and position=?;";
            $id=$dbh -> prepare($requete);
            $id->execute(array($nom,$personne,$position));
            $idE= $id->fetch()["id"];
        }else{
            $idE=$existe->fetch()["id"];
        }
        if(isset($_SESSION['position'])){
            $requete="select id from etape join listeetape on etape.id=listeetape.idEtape where position=? and idCircuit=?";
            $id=$dbh -> prepare($requete);
            $id->execute(array($position,$idCircuit));
            $idAncienneE=$id->fetch()["id"];
            $requete="UPDATE listeetape
            SET idEtape =?
            WHERE idCircuit =? and idEtape=?";
            $update=$dbh -> prepare($requete);
            $update->execute(array($idE,$idCircuit,$idAncienneE));
            unset($_SESSION["position"]);
            header("Refresh:0");
        }else{
            $requete="INSERT into listeEtape value(?,?)";
            $insertion=$dbh -> prepare($requete);
            $insertion->execute(array($idCircuit,$idE));
            header("Refresh:0");
        }
        
    }
}

if(isset($_POST['supprimer'])){
    $requete="DELETE FROM listeetape WHERE idCircuit=? and idEtape=?";
    $suppresion=$dbh -> prepare($requete);
    $suppresion->execute(array($idCircuit,$_POST["supprimer"]));
    header("Refresh:0");
}

function getNomEtape($id){
    include("../Controleur/connexionBD.php");
    $requete = "SELECT nom FROM etape where id=?";
    $requeteNomEtape = $dbh -> prepare($requete);
    $requeteNomEtape -> execute(array($id));
    return $requeteNomEtape->fetch()["nom"];
}
function getPositionEtape($id){
    include("../Controleur/connexionBD.php");
    $requete = "SELECT position FROM etape where id=?";
    $requetePositonEtape = $dbh -> prepare($requete);
    $requetePositonEtape -> execute(array($id));
    return $requetePositonEtape->fetch()["position"];
}

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