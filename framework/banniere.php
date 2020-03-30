
<?php
include("../Controleur/connexionBD.php");
if(isset($_SESSION["login"])){
	if($_SESSION["role"]=="admin"){
		include("../Modele/gestionCircuit_modele.php");
		echo "<h2>Circuit</h2>";
		echo "<form method=\"post\" action=\"../framework/index.php?page=ajoutCircuitControleur\">
			<input type=\"submit\" name=\"circuit\" value=\"Créer un circuit\"/>
		</form>";
		echo "<ul>";
		while ($circuit = $requete_listeCircuit -> fetch()){
			echo "<li>";
			echo "<a href=\"index.php?page=ajoutEtapeControleur&id=".$circuit["id"]."\">".$circuit["nom"]."</a>";
			echo "</li>";
		}
		echo "</ul>";
	}else{
		include("../Modele/gestionDocument_modele.php");
		echo "<h2> Documents envoyés</h2>";echo "<form method=\"post\" action=\"../framework/index.php?page=ajoutDocumentControleur\">
		<input type=\"submit\" name=\"document\" value=\"Envoyer\"/>
	</form>";
		echo "<ul>";
		while ($document = $documentEnvoyer -> fetch()){
			echo "<li>";
			echo "<a href=\"index.php?page=controlerDocumentControleur&id=".$document["id"]."\">".$document["nom"]."</a>";
			echo "</li>";
		}
		echo "</ul>";
		echo "<h2> Documents à Traiter</h2>";
		echo "<ul>";
		while ($document = $documentAtraiter -> fetch()){
			echo "<li>";
			echo "<a href=\"index.php?page=validerDocumentControleur&id=".$document["id"]."\">".$document["nom"]."</a>";
			echo "</li>";
		}
		echo "</ul>";
	}
}
?>