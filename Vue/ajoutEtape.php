<style type="text/css">
td {
    border: black 1px solid;
    padding: 5px 5px 5px 5px;
}
table {
    border-collapse: collapse;
}
</style>
<div>
	<form method="post" action="../framework/index.php?page=ajoutEtapeControleur" name="creerEtape">
		<div>
			<fieldset>
				<legend>Créer une Etape</legend>
				<label for="nom">Nom :</label>
				<br/>
				<input name="nom" type="text" id="nom" required/>
				<br/>
				
				<label for="personne">Choisissez une personne agissant:</label>
				<br/>
				<select name="personne" required>
				<?php
					if($requeteUtilisateur->rowcount() != null){
						while($data = $requeteUtilisateur->fetch()){
							echo " <option value=".$data["login"].">".$data["nom"]." ".$data["prenom"]."</option>";
						}
					}
				?>
				</select>
				<br/>
				<label for="position">Position :</label>
				<br/>
				<input name="position" type="number" id="position" required/>
				<br/>
				<hr/>
				<input type="submit" name="creerEtape" value="Créer"/>
			</fieldset>
		</div>
	</form>	
</div>
<div>
	<form method="post" action="../framework/index.php?page=ajoutEtapeControleur" name="ajouterEtape">
		<div>
			<fieldset>
				<legend>Gérer les Etapes</legend>
				
				<label for="Etape">Choisissez une étape:</label>
				<br/>
				<select name="Etape" required>
				<?php
					if($requeteEtape->rowcount() != null){
						while($data = $requeteEtape->fetch()){
							echo " <option value=".$data["id"].">".$data["nom"]." : ".$data["position"]."</option>";
						}
					}
				?>
				</select>
				<br/>
				<hr/>
				<?php
				echo "<button name=\"etape\" type=\"submit\" value=".$idCircuit.">Ajouter</button>"
				?>
			</fieldset>
		</div>
	</form>
	<table>
		<tr>
			<?php
					echo "<td colspan=2>Circuit: ". $circuit["nom"]."</td><td>Type de document: ".$circuit["typeDocument"]."</td></tr>";
			?>
		<tr>
		<td colspan=3>Etapes:</td>
		</tr>
		<tr>
		<td>Nom</td><td>Personne agisante</td><td>Position</td>
		</tr>
		<?php
		while ($idEtape = $requeteListeEtape -> fetch()) {
        echo "<tr>";
        echo "<td>".getNomEtape($idEtape["idEtape"])."</td>";
        echo "<td>".getPersonneEtape($idEtape["idEtape"])["nom"]." ".getPersonneEtape($idEtape["idEtape"])["prenom"]."</td>";
        echo "<td>".getPositionEtape($idEtape["idEtape"])."</td>";
        echo "</tr>";
		}
	?>
	</table>
</div>