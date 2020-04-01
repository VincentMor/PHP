<?php
// ajouter un tableau avec le nom des pages autorisée et verifier si la page demande en fait partie
include("../Controleur/connexionBD.php");
include("../Modele/connexion_modele.php");

if(isset($_POST['deconnexion'])){
	session_destroy();
	header("Refresh:0");
 }
if(isset($_SESSION["login"])){
	if($_SESSION["role"]=="user"){
		if (isset($_GET["page"])){
			$page=$_GET["page"];
			include("../Controleur/".$page.".php");
		}else{
			echo "<h1>Selectonnnez un Document</h1>";
		}
	}else{
		if(isset($_GET["page"])){
			$page=$_GET["page"];
			include("../Controleur/".$page.".php");
		}else{
			echo "<h1>Selectonnnez un Circuit</h1>";
		}
	}
}else{
	include("../Vue/accueil.php");
}

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
