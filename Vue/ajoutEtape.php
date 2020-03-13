<div style="display: flex; justify-content: center; margin-top: 100px;">
	<form method="post" action="../framework/index.php?page=gestionCircuitControleur">
		<div>
			<fieldset>
				<legend>Ajout de circuit</legend>
				<label for="nom">Nom :</label>
				<br/>
				<input name="nom" type="text" id="nom" required/>
				<br/>
				
				<label for="personne">Choisissez une personne agissant:</label>
				<br/>
				<select name="personne" required>
				<?php
					if($listeUtilisateur->rowcount() != null){
						while($data = $listeUtilisateur->fetch()){
							echo " <option value=".$data["login"].">".$data["nom"]." ".$data["prenom"]."</option>";
						}
					}
				?>
				</select>
				<label for="position">Position :</label>
				<br/>
				<input name="position" type="number" id="position" required/>
				<br/>
				<hr/>
				<input type="submit" name="AjoutEtape" value="AjoutEtape"/>
			</fieldset>
		</div>
	</form>	
</div>