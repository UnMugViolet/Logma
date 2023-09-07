<?php
session_start();

$includePaths = [
    './classes/',
    '../classes/',
    '../../classes/',
];

$includePath = implode(PATH_SEPARATOR, $includePaths);

set_include_path(get_include_path() . PATH_SEPARATOR . $includePath);

require('session-manager.classes.php');

// If userrole null set userrole ""
if (!isset($_SESSION["userrole"])) {
    $_SESSION["userrole"] = "";
}


$sessionManager = new SessionManager();
$sessionManager->checkAutoLogout();
$sessionManager->checkUserRole();
$userAdmin = $sessionManager->getUserAdmin();
$userDev = $sessionManager->getUserDev();
$user = $sessionManager->getUser();
$notUser = $sessionManager->notUser();


$_SESSION['userAdmin'] = $userAdmin;
$_SESSION['userDev'] = $userDev;
$_SESSION['user'] = $user;
$_SESSION['notUser'] = $notUser;
    
?>