<?php 

class Login extends Dbh {
    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $uid))){
            $stmt = null;
            header("location: ../access-admin-logma?error=stmtfailed");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user){
            $stmt = null;
            header("location: ../access-admin-logma?error=usernotfound");
            exit();
        }
        
        $checkPwd = password_verify($pwd, $user["users_pwd"]);

        if (!$checkPwd){
            header("location: ../access-admin-logma?error=wronginformations");
            exit();
        }
        else {
            session_start();
            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["useruid"] = $user["users_uid"];
            $stmt = null;
        }
    }
}
?>
