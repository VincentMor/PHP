<?php
$requete = "SELECT login FROM utilisateur ORDER BY login;";
$listeUtilisateur=$dbh -> prepare($requete);
$listeUtilisateur->execute();

