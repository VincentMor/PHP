<?php
//On récupere tous les document que l'utilisateur connecté doit valdier
$requete="select document.* from document join listeetape on document.idCircuit=listeetape.idCircuit join etape on listeetape.idEtape=etape.id where positionactuelle=position and personne=?";
$documentAtraiter= $dbh -> prepare($requete);
$documentAtraiter -> execute(array($_SESSION['login']));
//On récupere tous les document envoyer par l'utilisateur connecté
$requete="select * from document where proprietaire=?";
$documentEnvoyer= $dbh -> prepare($requete);
$documentEnvoyer -> execute(array($_SESSION['login']));
//ON récupere tous les circuits
$requete = "SELECT * FROM circuit ORDER BY nom;";
$requete_listeCircuit = $dbh -> prepare($requete);
$requete_listeCircuit -> execute();

//on verifie que l'utilisateur soit un admin
if($_SESSION["role"]!="user"){
    header("Location: ../framework/index.php");
    exit();
}

//Gestion de la validation et du controle du parcour du document
if(isset($_GET["id"])){
    //On récupere l'id du circuit du document 
    $requete="select * from document where id=?";
    $requeteIdCircuit=$dbh -> prepare($requete);
    $requeteIdCircuit -> execute(array($_GET["id"]));
    $id=$requeteIdCircuit->fetch()["idCircuit"];
    //On récupere le nom du docuemnt 
    $requeteIdCircuit=$dbh -> prepare($requete);
    $requeteIdCircuit -> execute(array($_GET["id"]));
    $nom=$requeteIdCircuit->fetch()["nom"];
    //On récupere la position max du circuit du document 
    $requete = "SELECT max(position) FROM etape join listeetape on etape.id=listeetape.idEtape WHERE listeetape.idCircuit=?";
    $requetePositonEtape = $dbh -> prepare($requete);
    $requetePositonEtape -> execute(array($id));
    $dernierePosition=$requetePositonEtape->fetch()["max(position)"];
    //On récupere la position actuelle du document qui correspond a la position a valider 
    $requete="select positionactuelle from document where id=?";
    $doc=$dbh -> prepare($requete);
    $doc -> execute(array($_GET["id"]));
    $position=$doc->fetch()["positionactuelle"];
    //validation d'une étape
    if(isset($_POST["valider"])){
        $requete="UPDATE document
        SET positionactuelle =?
        WHERE id=?";
        $update=$dbh -> prepare($requete);
        //On incrémente la position de un, un circuit valider est un circuit dont la position zctuelle est superieur a la position max de son circuit 
        $update -> execute(array($position+1,$_GET["id"]));
        header("Refresh:0");
    }
}

//Ajout d'un document 
if(isset($_POST["ajoutDocument"]) && isset($_POST["circuit"])){
    $target_dir = "../Document/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        //SI le document aété récuperé avec succes on prévient l'utilisateur
        $requete="INSERT into document (nom,positionActuelle,proprietaire,idCircuit) values(?,1,?,?)";
        $insertion=$dbh -> prepare($requete);
        $insertion->execute(array(basename($_FILES["document"]["name"]),$_SESSION['login'],$_POST["circuit"]));
        echo '<script type="text/javascript">alert("Document envoyé avec succès")</script>';
        header("Refresh:0");
    } else {
        //Sinon on signale l'erreur a l'utilisateur
        echo '<script type="text/javascript">alert("Une erreur est survenue veuillez réessayer \nÊtes-vous sur d\'avoir sélectioné un fichier?")</script>';
    }
}

