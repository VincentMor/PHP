<?php
$requete="select document.* from document join listeetape on document.idCircuit=listeetape.idCircuit join etape on listeetape.idEtape=etape.id where positionactuelle=position and personne=?";
$documentAtraiter= $dbh -> prepare($requete);
$documentAtraiter -> execute(array($_SESSION['login']));
$requete="select * from document where proprietaire=?";
$documentEnvoyer= $dbh -> prepare($requete);
$documentEnvoyer -> execute(array($_SESSION['login']));
$requete = "SELECT * FROM circuit ORDER BY nom;";
$requete_listeCircuit = $dbh -> prepare($requete);
$requete_listeCircuit -> execute();
if($_SESSION["role"]!="user"){
    header("Location: ../framework/index.php");
    exit();
}
if(isset($_GET["id"])){
    $requete="select * from document where id=?";
    $requeteIdCircuit=$dbh -> prepare($requete);
    $requeteIdCircuit -> execute(array($_GET["id"]));
    $id=$requeteIdCircuit->fetch()["idCircuit"];
    $requeteIdCircuit=$dbh -> prepare($requete);
    $requeteIdCircuit -> execute(array($_GET["id"]));
    $nom=$requeteIdCircuit->fetch()["nom"];
    $requete = "SELECT max(position) FROM etape join listeetape on etape.id=listeetape.idEtape WHERE listeetape.idCircuit=?";
    $requetePositonEtape = $dbh -> prepare($requete);
    $requetePositonEtape -> execute(array($id));
    $dernierePosition=$requetePositonEtape->fetch()["max(position)"];
    $requete="select positionactuelle from document where id=?";
    $doc=$dbh -> prepare($requete);
    $doc -> execute(array($_GET["id"]));
    $position=$doc->fetch()["positionactuelle"];
    if(isset($_POST["valider"])){
        $requete="UPDATE document
        SET positionactuelle =?
        WHERE id=?";
        $update=$dbh -> prepare($requete);
        $update -> execute(array($position+1,$_GET["id"]));
    }
}

if(isset($_POST["ajoutDocument"]) && isset($_POST["circuit"])){
    $target_dir = "../Document/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        $requete="INSERT into document (nom,positionActuelle,proprietaire,idCircuit) values(?,1,?,?)";
        $insertion=$dbh -> prepare($requete);
        $insertion->execute(array(basename($_FILES["document"]["name"]),$_SESSION['login'],$_POST["circuit"]));
        echo '<script type="text/javascript">alert("Document envoyé avec succès")</script>';
        header("Refresh:0");
    } else {
        echo '<script type="text/javascript">alert("Une erreur est survenue veuillez réessayer \nÊtes-vous sur d\'avoir sélectioné un fichier?")</script>';
    }
}

