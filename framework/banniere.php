<?php 
	if(isset($_SESSION[$login]) && $_SESSION["role"]=="admin"){
			echo'  
				<h2> Interface Administrateur</h2>
			    <ul>
			        <li><a  href="admin_vue.php">Utilisateur</a></li>
			        <li><a href="admin_circuit_vue.php">Circuit</a></li>
			        
			    </ul>';
	}else{
		if(isset($_SESSION[$login]) && $_SESSION["role"]=="user"){
			echo'
				<h2> Documents à Traiter</h2>
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>';
		}
	}
?>
