<style type="text/css">
body {
    display: flex;
    justify-content: center;
}
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
            Presonne agissante
        </td>
        <td>
            Position
        </td>
    </tr>
<?php
if (true) {
    while ($etape = $requeteEtape -> fetch()) {
        echo "<tr>";
        echo "<td>".$etape["nom"]."</td>";
        echo "<td>".$etape["personne"]."</td>";
        echo "<td>".$etape["position"]."</td>";
        echo "<td><form method=\"post\" action=\"../framework/index.php?page=gestionCricuitControleur\"><button name=\"supprimer\" type=\"submit\" value=".$etape["id"].">supprimer</button></form></td>";
        echo "</tr>";
    }        
    echo "</table>";
} else {
    echo "Vous n'êtes pas Administrateur !";
}
?>