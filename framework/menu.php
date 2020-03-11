<?php
if(isset($_SESSION["login"])){
    echo'<div class="rub"><form method="post" action="../framework/index.php?page=deconnexionControleur">
	<input type="submit" name="deconnexion" value="deconnexion" />
	</form>	</div>';
}