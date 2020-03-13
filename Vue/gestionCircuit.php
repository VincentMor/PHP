<style type="text/css">
/* body {
    display: flex;
    justify-content: center;
} */
td {
    border: black 1px solid;
    padding: 5px 5px 5px 5px;
}
table {
    border-collapse: collapse;
}
</style>
<table>
    <tr>
        <td>
            Nom du circuit
        </td>
        <td>
            Type de document
        </td>
        <td>
            <form method="post" action="../framework/index.php?page=ajoutCircuitControleur">
                <input type="submit" name="circuit" value="Créer un circuit"/>
            </form>
        </td>
    </tr>
    <tr>
<?php
if (true) {
    while ($listeCircuitUtilisable = $requete_listeCircuit -> fetch()) {
        echo "<tr>";
        echo "<td>".$listeCircuitUtilisable["nom"]."</td>";
        echo "<td>".$listeCircuitUtilisable["typeDocument"]."</td>";
        echo "<td><form method=\"post\" action=\"../framework/index.php?page=gestionCricuitControleur\"><button name=\"supprimer\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">supprimer</button></form><form method=\"post\" action=\"../framework/index.php?page=ajoutEtapeControleur\"><button name=\"ajouterEtape\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">Etape</button></form></td>";
        echo "</tr>";
    }        
    echo "</table>";
} else {
    echo "Vous n'êtes pas Administrateur !";
}
?>