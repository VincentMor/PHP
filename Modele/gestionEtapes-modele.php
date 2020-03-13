<?php
$requete = "SELECT * FROM etape ORDER BY nom;";
$requeteEtape = $dbh -> prepare($requete);
$requeteEtape -> execute();