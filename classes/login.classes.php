<?php 

class Login extends Dbh {
    protected function getUser($uid, $pwd){

        $sql = 'SELECT * FROM users WHERE users_uid = ? OR users_email = ?;';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uid, $uid))){
            $stmt = null;
            $this->logEvent("ERROR: statement execution failed", "ERROR");
            header("location: ../access-admin-logma?error=stmtfailed");
            exit();
        }
        

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        if (!$user){
            $stmt = null;
            $this->logEvent("ERROR: Connexion attempt with unknow user", "ERROR");
            header("location: ../access-admin-logma?error=wronginformations");
            exit();
        }
        
        $checkPwd = password_verify($pwd, $user["users_pwd"]);

        if (!$checkPwd){
            $this->logEvent("FAIL: Connexion attempt with known user", "WARNING");
            header("location: ../access-admin-logma?error=wronginformations");
            exit();
        }

        else {
            session_start();
            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["useruid"] = $user["users_uid"];
            $_SESSION["useremail"] = $user["users_email"];
            $_SESSION["userrole"] = $user["users_role"];
            $_SESSION['last_activity'] = $_SERVER['REQUEST_TIME'];

            $this->logEvent("SUCCESS: Login for user: " . $user["users_uid"]);
            $stmt = null;
        }
    }

    public function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    private function logEvent($message, $severity = "LOGINOK") {
        $logFile = "../log/login_log.txt";
        
        // Timezone 
        $parisTimezone = new DateTimeZone('Europe/Paris');
        $dateTime = new DateTime('now', $parisTimezone);
        $timestamp = $dateTime->format("Y-m-d H:i:s");  

        //Ip address
        $ip = $this->getIp();

        $severityIcons = [
            "LOGINOK" => "✅",
            "WARNING" => "⚠️",
            "ERROR" => "❌",
        ];

        $severityIcon = isset($severityIcons[$severity]) ? $severityIcons[$severity] : $severityIcons["LOGINOK"];
        $logMessage = "[$timestamp] IP: [$ip] $severityIcon $message" . PHP_EOL;

        // Append the log message to the log file
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}
?>
