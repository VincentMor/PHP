<div class="row">
	<div class="col-6 mx-3">
		<h2>Ajouter une Etape</h2>
		<form method="post" action="../framework/index.php?page=ajoutEtapeControleur" name="creerEtape">
			<div class="row my-3 mx-4">
				<label class="col-6" for="nom">Nom :</label>
				<input class="col-6" name="nom" type="text" id="nom" required/>
			</div>
			<div class="row my-3 mx-4">
				<label class="col-6" for="typeDoc">Choisissez une personne agissant:</label>
				<select class="col-6" name="personne" required>
					<?php
						if($requeteUtilisateur->rowcount() != null){
							while($data = $requeteUtilisateur->fetch()){
								echo " <option value=".$data["login"].">".$data["prenom"]." ".$data["nom"]."</option>";
							}
						}
					?>
				</select>
			</div>
			<div class="row my-3 mx-4">
				<hr/>
				<input type="submit" name="ajouterEtape" value="Ajouter"/>
			</div>
		</form>	
	</div>
</div>
<div class="row my-3 mx-4">
	<table class="table col-12">
		<tr>
			<?php
					echo "<td colspan=2>Circuit: ". $circuit["nom"]."</td>
					<td>Type de document: ".$circuit["typeDocument"]."</td></tr>";
			?>
		<tr>
		<td colspan=3>Etapes:</td>
		</tr>
		<tr>
			<td>Nom</td>
			<td>Personne agisante</td>
			<td>Position</td>
		</tr>
		<?php
		while ($idEtape = $requeteListeEtape -> fetch()) {
			echo "<tr>";
			echo "<td>".getNomEtape($idEtape["idEtape"])."</td>";
			echo "<td>".getPersonneEtape($idEtape["idEtape"])["prenom"]." ".getPersonneEtape($idEtape["idEtape"])["nom"]."</td>";
			echo "<td>".getPositionEtape($idEtape["idEtape"])."</td>";
			echo "<td><form method=\"post\" action=\"../framework/index.php?page=ajoutEtapeControleur\"><button name=\"modifier\" type=\"submit\" value=".$idEtape["idEtape"].">modifier</button></form>";
			if(getPositionEtape($idEtape["idEtape"])==getDernierePosition($idCircuit)){
				echo "<form method=\"post\" action=\"../framework/index.php?page=ajoutEtapeControleur\"><button class=\"btn btn-link confirmation\" name=\"supprimer\" type=\"submit\" value=".$idEtape["idEtape"].">supprimer</button></form>";
			}
			echo "</td>";
			echo "</tr>";
		}
	?>
	</table>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm ('Voulez-vous vraiment supprimer cette étape ?');
    }); 
</script>