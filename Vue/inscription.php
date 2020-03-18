<div class="row" id="headrow">
    <div class="col-12">
        <h3>Ajouter un utilisateur</h3>
    </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-7 col-lg-5 mx-5">
		<form class="form-signin" method="post" action="../framework/index.php?page=gestionUtilisateurControleur" name="inscription">
			<div class="row my-3">
				<label class="col-6" for="nom">Nom :</label>
				<input class="col-6" name="nom" type="text" id="nom" required/>
			</div>
			<div class="row my-3">
				<label class="col-6" for="prenom">Prenom :</label>
				<input class="col-6" name="prenom" type="text" id="prenom" required/>
			</div>
			<div class="row">
				<label class="col-6" for="login">email:</label>
				<input class="col-6" name="login" type="text" id="login" required/>
			</div>

			<div class="row my-3">
				<label class="col-6" for="mdp">Mot de passe:</label>
				<input class="col-6" type="password" name="mdp" type="text" id="mdp" required/>
			</div>
			<div class="row my-3">
				<label class="col-6" for="mdp">Mot de passe:</label>
				<input class="col-6" type="password" name="mdp" type="text" id="mdp" required/>
			</div>
			
			<div class="row my-3">
				<hr/>
				<input class="btn btn-primary" type="submit" name="inscription" value="ajouter"/>
			</div>								
		</form>			
		<a href="index.php?page=gestionUtilisateurControleur">Retour à la liste</a>
	</div>
</div>



