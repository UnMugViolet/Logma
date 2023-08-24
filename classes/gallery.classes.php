<?php

class Upload extends Dbh {

    protected function setImage($filetitle, $city){

        $stmt = $this->connect()->prepare('INSERT INTO gallery (gallery_title, gallery_city, gallery_imgFullName) VALUES (?,?,?,?);');
        
        if (!$stmt->execute(array($filetitle, $city))) {
            $stmt = null;
                header("location: ../access-admin-logma/signup?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkImage($newFileName){

        $stmt = $this->connect()->prepare('SELECT gallery_title FROM gallery WHERE gallery_title = ?;');
        
        if (!$stmt->execute(array($newFileName))) {
            $stmt = null;
            header("location: ../access-admin-logma/signup?error=stmtfailed");
            exit();
        }

        
        $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $resultCheck= "";
        if (count($loginData) > 0) {
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        
        return $resultCheck;
    }
}