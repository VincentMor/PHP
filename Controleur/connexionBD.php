<?php
    try {
        $dbname='vm484242';
        $user='vm484242';
        $pass='vm484242';
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
