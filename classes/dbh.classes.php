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
            die("Erreur !:" . $e->getMessage() . "<br/>");
        }
    }

}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "logma-bdd";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);