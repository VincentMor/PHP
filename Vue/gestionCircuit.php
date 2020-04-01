<div class="row" id="headrow">
        <div class="col-10">
            <h3>Liste des circuits</h3>
        </div>
        <div class="col-2">
            <a class="btn btn-primary" id="ajoutU" href="index.php?page=ajoutCircuitControleur">AJOUTER</a>
        </div>
    </div>
    <div class="row" id="liste">
        <table class="table">
            <thead class="thead">
                <tr>
                  <th scope="col">Nom du circuit</th>
                  <th scope="col">Type de document</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        while ($listeCircuitUtilisable = $requete_listeCircuit -> fetch()) {
                            echo "<tr>";
                            echo "<td>".$listeCircuitUtilisable["nom"]."</td>";
                            echo "<td>".$listeCircuitUtilisable["typeDocument"]."</td>";
                            echo "<td>
                            <form method=\"post\" action=\"../framework/index.php?page=gestionCricuitControleur\"><button  class=\"btn btn-link confirmation\" name=\"supprimer\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">supprimer</button></form>";
                            echo "<form method=\"post\" action=\"../framework/index.php?page=ajoutEtapeControleur\"><button class=\"btn btn-primary \" name=\"ajouterEtape\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">Etape</button></form>";
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
        return confirm ('Voulez-vous vraiment supprimer ce circuit ?');
    }); 

    $("#etape").on('click', function(){
                $('.modal-body').html();
                   //on ouvre la modale
                $('#modalMarqueur').modal('show');});

         
</script>