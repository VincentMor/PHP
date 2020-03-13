<?php
if(isset($_SESSION["login"])){
    echo'<div class="rub"><form method="post" action="../framework/index.php">
	<input type="submit" name="deconnexion" value="deconnexion" />
	</form>	</div>';
	if($_SESSION["role"]=="admin"){
		echo'<div class="rub"><form method="post" action="../framework/index.php?page=gestionUtilisateurControleur">
		<input type="submit" name="gestionUtilisateur" value="gestionUtilisateur" />
		</form>	</div>';
		echo'<div class="rub"><form method="post" action="../framework/index.php?page=gestionCircuitControleur">
		<input type="submit" name="gestionCircuit" value="gestionCircuit" />
		</form>	</div>';
	}
}
