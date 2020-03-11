<?php
if(	isset($_POST['login']) && !empty($_POST['login'])){ /*&& 
    isset($_POST['password']) && !empty($_POST['password']) ){*/ 
    
    // On s'occupe maintenant des variables en les filtrant chacunes selon son type
    $login= filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $mdp = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    include ("../Controleur/connexionBD.php");
    // préparation de la requête SQL pour insérer dans la bdd
    $utilisateur= $dbh->prepare('select * from utilisateur where login = ? and mdp = ?');
    // Exécution de la requête   
    $utilisateur->execute(array($login,$mdp));
    $res=$utilisateur->rowCount();
    if($res==1){
        $param_login=$_POST['login'];
        $_SESSION['login']=$param_login;
        header("Refresh:0");
    }else{
        echo 'login ou mot de passe incorrect';
    }
}


    