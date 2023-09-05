<?php 

class Login extends Dbh {
    protected function getUser($uid, $pwd){

        $sql = 'SELECT * FROM users WHERE users_uid = ? OR users_email = ?;';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uid, $uid))){
            $stmt = null;
            $this->logEvent("SQL statement execution failed", "ERROR");
            header("location: ../access-admin-logma?error=stmtfailed");
            exit();
        }
        

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        if (!$user){
            $stmt = null;
            $this->logEvent("Connexion attempt with unknow user", "ERROR");
            header("location: ../access-admin-logma?error=wronginformations");
            exit();
        }
        
        $checkPwd = password_verify($pwd, $user["users_pwd"]);

        if (!$checkPwd){
            $this->logEvent("Connexion attempt with known user", "WARNING");
            header("location: ../access-admin-logma?error=wronginformations");
            exit();
        }



        else {
            session_start();
            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["useruid"] = $user["users_uid"];
            $_SESSION["userrole"] = $user["users_role"];
            $_SESSION['last_activity'] = $_SERVER['REQUEST_TIME'];

            $this->logEvent("Successful login for user: " . $user["users_uid"]);
            $stmt = null;
        }
    }

    private function logEvent($message, $severity = "INFO") {
        $logFile = "../log/login_log.txt";
        $timestamp = date("Y-m-d H:i:s");

        $severityIcons = [
            "INFO" => "ℹ️",
            "WARNING" => "⚠️",
            "ERROR" => "❌",
        ];

        $severityIcon = isset($severityIcons[$severity]) ? $severityIcons[$severity] : $severityIcons["INFO"];
        $logMessage = "[$timestamp] $severityIcon $message" . PHP_EOL;

        // Append the log message to the log file
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}
?>
