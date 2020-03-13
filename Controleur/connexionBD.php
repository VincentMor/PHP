<?php
    try {
        $dbname='work';
        $user='root';
        $pass="";
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
