<?php
$requete = "SELECT * FROM circuit ORDER BY nom;";
$requete_listeCircuit = $dbh -> prepare($requete);
$requete_listeCircuit -> execute();
$requete = "SELECT count(*) FROM circuit;";
$requete_nbCircuit = $dbh -> prepare($requete);
$requete_nbCircuit -> execute();
$nbCircuitNonUtilisable = $requete_nbCircuit -> fetch();
$nbCircuitUtilisable = $nbCircuitNonUtilisable["count(*)"];
// table circuit
//un id circuit, un nom de circuit, un type de document et une étape
?>