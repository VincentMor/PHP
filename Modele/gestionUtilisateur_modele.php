<?php
$requete = "SELECT * FROM utilisateur ORDER BY nom;";
$requete_utilisateur = $dbh -> prepare($requete);
$requete_utilisateur -> execute();


if(isset($_POST["inscription"])){
    inscription();
}





function inscription(){
    if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['mdp']) && !empty($_POST['mdp']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom'])){
        $login=filter_var($_POST['login'], FILTER_SANITIZE_STRING);
        $mdp=filter_var($_POST['mdp'], FILTER_SANITIZE_STRING);
        $nom=filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $prenom=filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
        $requete = "SELECT * FROM utilisateur where login=?;";
        $verif= $dbh -> prepare($requete);
        $verif->execute($login);
        if($verif->rowcount()==null){
            $requete="INSERT into utilisateur values (?,?,'user',?,?)";
            $insertion=$dbh-> prepare($requete);
            $insertion->execute(array($login,$mdp,$nom,$prenom));
            header("Refresh:0");
        }
    }
}