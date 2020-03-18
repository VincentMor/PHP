<div class="row">
	<div class="col-6 mx-3">
		<h2>Créer une Etape</h2>
		<form class="form-signin" method="post" action="../framework/index.php?page=creerEtapeControleur">
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
								echo " <option value=".$data["login"].">".$data["nom"]." ".$data["prenom"]."</option>";
							}
						}
					?>
					</select>
			</div>
			<div class="row my-3 mx-4">
				<label class="col-6" for="nom">Position :</label>
				<input class="col-6" name="position" type="number" id="position" required/>
			</div>
			<div class="row my-3 mx-4">
				<hr/>
				<input class="btn btn-primary" type="submit" name="creerEtape" value="Créer"/>
			</div>
		</form>	
	</div>

	<div class="col--6 mx-3">
	<h2>Gérer les Etapes</h2>
	<form method="post" action="../framework/index.php?page=ajoutEtapeControleur" name="ajouterEtape">
		<div class="row my-3 mx-4">	
			<label class="col-6" for="Etape">Choisissez une étape:</label>
			<select class="col-6" name="Etape" required>
			<?php
				if($requeteEtape->rowcount() != null){
					while($data = $requeteEtape->fetch()){
						echo " <option value=".$data["id"].">".$data["nom"]." : ".$data["position"]."</option>";
					}
				}
			?>
			</select>	
		</div>
		<div class="row my-3 mx-4">
			<hr/>
			<button class="btn btn-primary" name="etape" type="submit" value="<?= $idCircuit ?>">Ajouter</button>"
		</div>
	</form>
	</div>
</div>
<div class="row my-3 mx-4">
	<table class="table col-12">
        <thead class="thead">
            <tr>
              <th scope="col">Circuit:</th>
              <th scope="col">Type de document:</th>
              <th scope="col " colspan=3>Etapes:</th>
            </tr>
        </thead>
        <tbody>
        	<tr class="thead">
        		<th scope="col"></th>
        		<th scope="col"></th>
				<th scope="col">Nom</th>
				<th scope="col">Personne</th>
				<th scope="col" >Position</th>
			</tr>
			<tr>
				<?php while ($idEtape = $requeteListeEtape -> fetch()) { ?>
				<tr>
					<td ><?= $circuit["nom"] ?></td>
					<td><?= $circuit["typeDocument"] ?></td>
		            <td><?= getNomEtape($idEtape["idEtape"]) ?></td>
		       		<td><?= getPersonneEtape($idEtape["idEtape"])["nom"]." ".getPersonneEtape($idEtape["idEtape"])["prenom"] ?></td>
		        	<td><?= getPositionEtape($idEtape["idEtape"]) ?></td>
	        	</tr>
				<?php }	?>
			</tr>
	    </tbody>
	</table> 
</div>
