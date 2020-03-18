<div class="row" id="headrow">
    <div class="col-12">
        <h3>Ajouter un document</h3>
    </div>
</div>
<div class="row">
	<div class="col-sm-9 col-md-7 col-lg-5 mx-5">
		<form class="form-signin" method="post" action="../framework/index.php?page=gestionCircuitControleur" name="document">
			<div class="row my-3">
				<label class="col-6" for="nom">Nom  du document:</label>
				<input class="col-6" name="nom" type="text" id="nom" required/>
			</div>
			<div class="row my-3">
				<label class="col-6" for="doc">document :</label>
				<input class="col-6" name="doc" type="file"  id="doc" required/>
			</div>
			<div class="row my-3">
				<label class="col-6" for="circuit">circuit :</label>
				<input class="col-6" name="circuit" type="file"  id="circuit" required/>
			</div>
			<div class="row my-3">
				<hr/>
					<input type="submit" name="AjoutDocument" value="AjoutDocument"/>
			</div>
		</form>	
	</div>
</div>