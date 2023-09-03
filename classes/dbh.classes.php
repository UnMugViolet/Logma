<?php

class Dbh
{
    public function connect()
    {
        try {

            $dbusername = "root";
            $dbpassword = "";
            $dbh = new PDO('mysql:host=localhost;dbname=logma-bdd', $dbusername, $dbpassword);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;

        } catch (PDOException $e) {

            die("Erreur !:" . $e->getMessage() . "<br/>");
            
        }
    }
}
