<?php
$requete = "SELECT pseudo FROM utilisateur ORDER BY nom;";
$listeUtilisateur=$dbh -> prepare($requete);
$listeUtilisateur->execute();

