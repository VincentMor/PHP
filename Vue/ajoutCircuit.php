<div style="display: flex; justify-content: center; margin-top: 100px;">
	<form method="post" action="../framework/index.php?page=gestionCircuitControleur">
		<div>
			<fieldset>
				<legend>Ajout de circuit</legend>
				<label for="nom">Nom :</label>
				<br/>
				<input name="nom" type="text" id="nom" required/>
				<br/>
				<label for="typeDoc">Type de document :</label>
				<br/>
				<input name="typeDoc" type="text" id="nom" required/>
				<br/>
				<label for="etapes">Ajouter des étapes:</label>
				<br/>
				<select name="etapes" required multiple>
				<?php
					if($listeUtilisateur->rowcount() != null){
						while($data = $listeUtilisateur->fetch()){
							echo " <option value=".$data["login"].">".$data["login"]."</option>";
						}
					}
				?>
				</select>
				<hr/>
				<input type="submit" name="AjoutCircuit" value="AjoutCircuit"/>
			</fieldset>
		</div>
	</form>	
</div>