<style type="text/css">
td {
    border: black 1px solid;
    padding: 5px 5px 5px 5px;
}
table {
    border-collapse: collapse;
}
</style>
<a href="index.php?page=ajoutCircuitControleur">Ajout de circuit</a>
<table>
    <tr>
        <td>
            Nom
        </td>
        <td>
           Prenom
        </td>
        <td>
            <form method="post" action="../framework/index.php?page=inscriptionControleur">
                <input type="submit" name="inscription" value="Ajouter un Utilisateur"/>
            </form>
        </td>
    </tr>
    <tr>
<?php
if (true) {
    while ($utilisateur = $requete_utilisateur -> fetch()) {
        echo "<tr>";
        echo "<td>".$utilisateur["nom"]."</td>";
        echo "<td>".$utilisateur["prenom"]."</td>";
        echo "<td><form method=\"post\" action=\"../framework/index.php?page=gestionUtilisateurControleur\"><button name=\"supprimer\" type=\"submit\" value=".$utilisateur["login"].">supprimer</button></form></td>";
        echo "</tr>";
    }        
    echo "</table>";
} else {
    echo "Vous n'êtes pas Administrateur !";
}
?>