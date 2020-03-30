<form action="../framework/index.php" method="post" enctype="multipart/form-data">
<legend>Envoyer un document</legend>
    <input type="file" name="document" required>
    <select name="circuit" required>
    <?php
        if($requete_listeCircuit->rowcount() != null){
            while($circuit = $requete_listeCircuit->fetch()){
                echo " <option value=".$circuit["id"].">".$circuit["nom"]." : ".$circuit["typeDocument"]."</option>";
            }
        }
    ?>
    </select>
    <input type="submit" value="Envoyer" name="ajoutDocument">
</form>