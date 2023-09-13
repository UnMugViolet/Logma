<?php
include_once('./user-role-check.inc.php');
include_once('../classes/users-manager.classes.php');

if($userAdmin){
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {    
        $userManager = new UserManager();
        
        sleep(2);
    
        if (isset($_POST['user_id'])) {
            $userId = $_POST['user_id'];
            $userManager->deleteUser($userId);
        } else {
            header("Location: ../access-admin-logma/delete-account?error=stmtfailed");
            exit();
        }
    }
} else{
    $sessionManager->forbiddenAccess();
} 

