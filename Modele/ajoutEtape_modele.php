<?php
$requete = "SELECT login,nom,prenom FROM utilisateur where role<>'admin' ORDER BY login;";
$requeteUtilisateur=$dbh -> prepare($requete);
$requeteUtilisateur->execute();

$requete = "SELECT * FROM etape ORDER BY nom;";
$requeteEtape = $dbh -> prepare($requete);
$requeteEtape -> execute();

if(isset($_POST['creerEtape'])){
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['personne']) && !empty($_POST['personne']) && isset($_POST['position']) && !empty($_POST['position'])){
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $personne = filter_var($_POST['personne'], FILTER_SANITIZE_STRING);
        $position=$_POST['position'];
        $requete = "SELECT id FROM etape where nom=? and personne=? and position=?;";
        $existe=$dbh -> prepare($requete);
        $existe->execute(array($nom,$personne,$position));
        if($existe->rowcount() != null){
            echo "<script>alert(\"Cette étape existe déjà\");</script>";
        }else{
            $requete="INSERT into etape (nom,personne,position) values(?,?,?)";
            $insertion=$dbh -> prepare($requete);
            $insertion->execute(array($nom,$personne,$position));
            header("Refresh:0");
        }   
    }
}

if(isset($_POST['ajouterEtape'])||isset($_POST['etape'])||isset( $_SESSION["idCircuit"])){
    if(isset($_POST['ajouterEtape'])){
        $idCircuit=$_POST['ajouterEtape'];
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


if(isset($_POST['etape'])){
    $requete="INSERT into listeEtape value(?,?)";
    $idE = filter_var($_POST['Etape'], FILTER_SANITIZE_STRING);
    if(getPositionEtape($_POST['Etape'])==getDernierePosition($idCircuit)+1){
        $insertion=$dbh -> prepare($requete);
        $insertion->execute(array($idCircuit,$idE));
        header("Refresh:0");
    }else{
        phpAlert("Veuillez ajouter les étapes dans l'ordre");
    }
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