<div class="row">
	<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
		<div class="card card-signin my-5">
			<div class="card-body">
				<h5 class="card-title text-center">Connexion</h5>
				<form class="form-signin" action="../framework/index.php" method="post">
					<div class="form-label-group my-4">
						<label for="login">login</label>
						<input type="text" id="login" name="login" class="form-control" placeholder="login" required autofocus>
					</div>
					<div class="form-label-group my-4">
						<label for="mdp">mot de passe</label>
						<input type="password" id="mdp" name="password" class="form-control" placeholder="mot de passe" required>
					
					</div>
					<div class="custom-control custom-checkbox mb-3">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">mot de passe oublié</label>
					</div>
					<hr class="my-4">
					<input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="Connexion" value="Connexion" />
				</form>
			</div>
		</div>
	</div>
</div>	
