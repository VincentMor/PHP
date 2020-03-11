<div style="display: flex; justify-content: center; margin-top: 100px;">
	<form method="post" action="../framework/index.php?page=gestionCircuit">
		<div>
			<fieldset>
				<legend>Ajout de circuit</legend>
				<label for="nom">Nom :</label>
				<br/>
				<input name="nom" type="text" id="nom" />
				<br/>
				<label>Ajouter des étapes:
					<select name="etapes" multiple>
					<?php
						
					?>
					</select>
				</label>
				<hr/>
				<input type="submit" name="AjoutCircuit" value="AjoutCircuit"/>
			</fieldset>
		</div>
	</form>	
</div>