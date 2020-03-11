<?php
session_start();
echo'<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>'.$_SESSION['login'].'</title>
</head>
<body>
C\'est- toujours '.$_SESSION['login'].'
<a href="../Vue/accueil.php"><button type="button" onclick='.session_destroy().'>Deconnecter</button></a>
</body>
</html>';