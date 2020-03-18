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
                <tr>
                <?php
                if (true) {
                    while ($listeCircuitUtilisable = $requete_listeCircuit -> fetch()) {
                        echo "<td>".$listeCircuitUtilisable["nom"]."</td>";
                        echo "<td>".$listeCircuitUtilisable["typeDocument"]."</td>";
                        echo "<td>
                        <form method=\"post\" action=\"../framework/index.php?page=gestionCricuitControleur\"><button  class=\"btn btn-link confirmation\" name=\"supprimer\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">supprimer</button></form>";
                        echo "<form method=\"post\" action=\"../framework/index.php?page=ajoutEtapeControleur\"><button class=\"btn btn-primary \" name=\"ajouterEtape\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">Etape</button></form>";
                        echo "</td>";
                        
                    }        
                    echo "</table>";
                } else {
                    echo "Vous n'êtes pas Administrateur !";
                }
                ?>
                </tr>
            </tbody>
        </table>
    </div>
   <!-- modal non fonctionnel
    <button type="button" id="etape" class="btn btn-secondary btn-lg"  data-target="#modalMarqueur">Ajouter une etape</button> 
   
   
                       la modal
   <div class="modal fade" id="modalMarqueur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header text-center">
                   <h4 class="modal-title w-100 font-weight-bold"></h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
               </div>
             
               <div class="modal-body mx-3">
               <?php include('../Controleur/ajouteEtape.php');?>  
                  
               </div>
               <div class="modal-footer d-flex justify-content-center">
                   
                   <button type="button" class="btn btn-blue-grey" id="btnCloseIt" data-dismiss="modal">Annuler</button>
   
               </div>
           </div>
       </div>
   </div> -->
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