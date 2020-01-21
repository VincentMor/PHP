<?php
$page="accueil";
// ajouter un tableau avec le nom des pages autorisée et verifier si la page demande en fait partie

if (isset($_GET["page"])) {
	$page=$_GET["page"];
}

include "../Vue/".$page.".php";


?>
