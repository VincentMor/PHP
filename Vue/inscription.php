<div style="display: flex; justify-content: center; margin-top: 100px;">
	<form method="post" action="../framework/index.php?page=gestionUtilisateurControleur" name="inscription">
		<div>
			<fieldset>
				<legend>Ajout d'utilisateur</legend>
				<label for="login">email:</label>
				<br/>
				<input name="login" type="text" id="login" required/>
				<br/>
				<label for="mdp">Mot de passe:</label>
				<br/>
				<input type="password" name="mdp" type="text" id="mdp" required/>
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
				<input type="submit" name="inscription" value="Ajouter"/>
			</fieldset>
		</div>
	</form>
	<form method="post" action="../framework/index.php?page=gestionUtilisateurControleur" name="retourliste">
		<input type="submit" value="Retour à la liste" />
	</form>
</div>