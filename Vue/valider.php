<?php
echo"<form action=\"../framework/index.php?id=".$_GET["id"]."\" method=\"post\" enctype=\"multipart/form-data\">
<legend>Valider le document</legend>";
echo "<a href=\"../Document/".$nom."\"target=\"_blank\">".$nom."</a>";
?>
    <input type="submit" value="Valider" name="valider">
</form>