<?php 

class Login extends Dbh {

    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $uid))){
            $stmt =null;
            header("location: ../access-admin-logma?error=stmtfailed1");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($user) == 0){
            $stmt = null;
            header("location: ../access-admin-logma?error=usernotfound");
            exit();
        }
        
        $checkPwd = password_verify($pwd, $user[0]["users_pwd"]);

        if ($checkPwd == false){
            header("location: ../access-admin-logma?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true){
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];   
            
            $stmt = null;
        }
    }
}
?>
