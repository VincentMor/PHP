<div class="row" id="headrow">
    <div class="col-10">
        <h3>Liste des utilisateurs</h3>
    </div>
    <div class="col-2">
        <a class="btn btn-primary" id="ajoutU" href="index.php?page=inscriptionControleur">AJOUTER</a>
    </div>
</div>
<div class="row" id="liste">
    <table class="table">
        <thead class="thead">
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($utilisateur = $requete_utilisateur -> fetch()) {
                echo "<tr>";
                echo "<td>".$utilisateur["prenom"]."</td>";
                echo "<td>".$utilisateur["nom"]."</td>";
                echo "<td><form method=\"post\" action=\"../framework/index.php?page=gestionUtilisateurControleur\"><button class=\"btn btn-link confirmation\"name=\"supprimer\" type=\"submit\" value=".$utilisateur["login"]."><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>";
                echo "</tr>";
            }        
        ?>
        </tbody>
    </table>
</div>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->   
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm ('Voulez-vous vraiment supprimer cette utilisateur ?');
    }); 
</script>