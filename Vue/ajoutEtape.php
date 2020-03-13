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
	<form method="post" action="../framework/index.php?page=gestionEtapeControleur" name="ajouterEtape">
		<div>
			<fieldset>
				<legend>Gérer les Etapes</legend>
				
				<label for="personne">Choisissez une personne agissant:</label>
				<br/>
				<select name="personne" required>
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
				<input type="submit" name="etape" value="Ajouter"/>
			</fieldset>
		</div>
	</form>	
</div>