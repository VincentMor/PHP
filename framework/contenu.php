<?php
// ajouter un tableau avec le nom des pages autorisée et verifier si la page demande en fait partie
/*if(isset($_POST['Connexion'])){
	include("../Modele/connexion_modele.php");
}
if(isset($_POST['deconnexion'])){
	session_destroy();
	header("Refresh:0");
 }
if(isset($_SESSION["login"])){*/
	$page="gestionCircuitControleur";
	if (isset($_GET["page"])){
		$page=$_GET["page"];
	}
//}else{
	$page="connexionControleur";
//}
include("../Controleur/".$page.".php");
?>
