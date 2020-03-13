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

if(isset($_POST['ajouterEtape'])){
    $requete = "SELECT nom FROM circuit where id=?;";
    $requeteCircuit = $dbh -> prepare($requete);
    $requeteCircuit -> execute(array($_POST["ajouterEtape"]));
}