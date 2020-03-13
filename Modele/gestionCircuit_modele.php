<?php
$requete = "SELECT * FROM circuit ORDER BY nom;";
$requete_listeCircuit = $dbh -> prepare($requete);
$requete_listeCircuit -> execute();
$requete = "SELECT count(*) FROM circuit;";
$requete_nbCircuit = $dbh -> prepare($requete);
$requete_nbCircuit -> execute();
$nbCircuitNonUtilisable = $requete_nbCircuit -> fetch();
$nbCircuitUtilisable = $nbCircuitNonUtilisable["count(*)"];

if(isset($_POST['AjoutCircuit'])){
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['typeDoc']) && !empty($_POST['typeDoc']) && isset($_POST['etapes']) && !empty($_POST['etapes'])){
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $typeDoc = filter_var($_POST['typeDoc'], FILTER_SANITIZE_STRING);
        $requete = "SELECT id FROM circuit where nom=? and typeDocument=?;";
        $existe=$dbh -> prepare($requete);
        $existe->execute(array($nom,$typeDoc));
        if($existe->rowcount() != null){
            echo "<script>alert(\"Ce circuit existe déjà\");</script>";
        }else{
            $requete="INSERT into circuit (nom,typeDocument) values(?,?)";
            $insertion=$dbh -> prepare($requete);
            $insertion->execute(array($nom,$typeDoc));
            header("Refresh:0");
        }   
    }
}
if(isset($_POST['supprimer'])){
    $requete="DELETE FROM circuit WHERE id=?";
    $suppresion=$dbh -> prepare($requete);
    $suppresion->execute(array($_POST["supprimer"]));
    header("Refresh:0");
}