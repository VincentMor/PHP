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
				<hr/>
				<input type="submit" name="AjoutCircuit" value="AjoutCircuit"/>
			</fieldset>
		</div>
	</form>	
</div>
