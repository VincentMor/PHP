<header>
	<!-- La barre de navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark primary-color">
	  <!-- Navbar brand -->
	  <a id="log"class="navbar-brand" href="index.php">Workflow</a>
	  <!-- Collapsible content -->
	  <div class="collapse navbar-collapse" id="basicExampleNav">
	    <!-- Links -->
	    <ul class="  nav navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php"><i class="fas fa-home"></i>
	          <!-- <span class="sr-only">(current)</span> -->
	        </a>
	      </li>
	      
	      <li class="nav-item">
<?php
if(isset($_SESSION["login"])){
    echo'<div class="rub"><form method="post" action="../framework/index.php">
	<input type="submit" name="deconnexion" value="deconnexion" />
	</form>	</div>';
	if($_SESSION["role"]=="admin"){
		echo'<li class="nav-item">
	        <a class="nav-link" href="index.php?page=gestionUtilisateurControleur">Utilisateurs</a>
	      </li>';
	    echo'<li class="nav-item">
	        <a class="nav-link" href="index.php?page=gestionCircuitControleur">Circuits</a>
	      </li>';

		/*<div class="rub"><form method="post" action="../framework/index.php?page=gestionUtilisateurControleur">
		<input type="submit" name="gestionUtilisateur" value="gestionUtilisateur" />
		</form>	</div>';*/
		/*echo'<div class="rub"><form method="post" action="../framework/index.php?page=gestionCircuitControleur">
		<input type="submit" name="gestionCircuit" value="gestionCircuit" />
		</form>	</div>';*/
	}
}
