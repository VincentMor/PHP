
<?php
include("../Controleur/connexionBD.php");
if(isset($_SESSION["login"])){
	if($_SESSION["role"]=="admin"){
		include("../Modele/gestionCircuit_modele.php");
		echo "<h2>Circuit</h2>";
	}else{
		echo "<h2> Documents à Traiter</h2>";
	}
}
?>
<ul>
<?php 
while ($circuit = $requete_listeCircuit -> fetch()){
	echo "<li>";
	echo "<a href=\"index.php?page=gestionCircuitControleur&id=".$circuit[].">".$circuit["nom"]."</a>";
	echo "</li>";
}
?>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
</ul>