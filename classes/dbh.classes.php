<?php

class Dbh {

    protected function connect(){
        try {
            $dbusername = "root";
            $dbpassword = "";
            $dbh = new PDO('mysql:host=localhost;dbname=logma-bdd', $dbusername, $dbpassword);
            return $dbh;
        } 
        catch (PDOException $e) {
            print "Erreur !:" . $e->getMessage() . "<br/>";
            die();
        }
    }

}