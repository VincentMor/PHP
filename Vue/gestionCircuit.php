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

<table>
    <tr>
        <td>
            Nom du document
        </td>
    </tr>
    <tr>
<?php
$indiceLigne = 1;
if (true) {
    while ($listeCircuitUtilisable = $requete_listeCircuit -> fetch()) {
        echo "<td>".$listeCircuitUtilisable["nom"]."</td>";  
    }        
    echo "</table>";
} else {
    echo "Vous n'êtes pas Administrateur !";
}
?>