<div style="display: flex; justify-content: center; margin-top: 100px;">
	<form method="post" action="../framework/index.php?page=gestionUtilisateurControleur">
		<div>
			<fieldset>
				<legend>Ajout de circuit</legend>
				<label for="login">email:</label>
				<br/>
				<input name="login" type="text" id="login" required/>
				<br/>
				<label for="mdp">Mot de passe:</label>
				<br/>
				<input name="mdp" type="text" id="mdp" required/>
				<br/>
                <label for="nom">Nom :</label>
				<br/>
                <input name="nom" type="text" id="nom" required/>
				<br/>
                <label for="prenom">Prenom :</label>
				<br/>
                <input name="prenom" type="text" id="prenom" required/>
				<br/>
				<hr/>
				<input type="submit" name="inscription" value="inscription"/>
			</fieldset>
		</div>
	</form>	
</div>