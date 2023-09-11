<?php

class SessionManager {

    private $autoLogoutTime;
    private $userAdmin = false;
    private $userDev = false;
    private $user = false;
    private $notUser = '';

    public function __construct($autoLogoutTime = 1620) {
        $this->autoLogoutTime = $autoLogoutTime;
    }

    public function checkAutoLogout() {
        $time = $_SERVER['REQUEST_TIME'];

        if (isset($_SESSION['last_activity']) && ($time - $_SESSION['last_activity']) > $this->autoLogoutTime) {
            $this->logout();
        } else {
            $_SESSION['last_activity'] = $time;
        }
    }

    public function logout() {
            include (__DIR__ . "/../includes/logout.inc.php");
    }

    public function checkUserRole() {
        // Role checker
        switch ($_SESSION["userrole"]) {
            case "admin":
                $this->userAdmin = true;
                break;
    
            case "dev":
                $this->userDev = true;
                break;
    
            case "user":
                $this->user = true;
                break;
                
            case "":
                $this->notUser = true;
                break;
        
            default:
                $this->forbiddenAccess();
                break;
        }
    }

    public function getUserAdmin() {
        return $this->userAdmin;
    }

    public function getUserDev() {
        return $this->userDev;
    }

    public function getUser() {
        return $this->user;  
    }

    public function notUser() {
        return $this->notUser;
    }
    
    
    public function forbiddenAccess() {
        header("HTTP/1.1 403 Forbidden");
        include(__DIR__ . "/../pages/errors/403.html");
        exit();
    }

    public function notAllowed() {
        header("HTTP/1.1 401 Forbidden");
        include(__DIR__ . "/../pages/errors/401.html");
        exit();
    }

    public function maintenanceMode() {
        header("HTTP/1.1 503 Forbidden");
        include(__DIR__ . "/../pages/errors/maintenance-logma.html");
        exit();
    }
    
}