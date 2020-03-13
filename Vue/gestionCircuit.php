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
<a href="index.php?page=ajoutCircuitControleur">Ajout de circuit</a>
<table>
    <tr>
        <td>
            Nom du document
        </td>
        <td>
            Type de document
        </td>
    </tr>
    <tr>
<?php
if (true) {
    while ($listeCircuitUtilisable = $requete_listeCircuit -> fetch()) {
        echo "<tr>";
        echo "<td>".$listeCircuitUtilisable["nom"]."</td>";
        echo "<td>".$listeCircuitUtilisable["typeDocument"]."</td>";
        echo "<td><form method=\"post\" action=\"../framework/index.php?page=gestionCricuitControleur\"><button name=\"supprimer\" type=\"submit\" value=".$listeCircuitUtilisable["id"].">supprimer</button></form></td>";
        echo "</tr>";
    }        
    echo "</table>";
} else {
    echo "Vous n'êtes pas Administrateur !";
}
?>