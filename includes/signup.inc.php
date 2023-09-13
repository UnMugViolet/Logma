<?php
include_once('./user-role-check.inc.php');

if($userAdmin){

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Grabbing the data
        $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UTF-8');
        $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
        $pwdRepeat = htmlspecialchars($_POST["pwdrepeat"], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
        $userRole = htmlspecialchars($_POST["userrole"], ENT_QUOTES, 'UTF-8');
    
        // Instantiaite Signup classes
        require "../classes/dbh.classes.php";
        require "../classes/signup.classes.php";
        require "../classes/signup-contr.classes.php";
    
        $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email, $userRole);
        
        //Running error handlers and user signup
        $signup->signupUser();
    
        // Going back to login
        header("location: ../access-admin-logma/signup?error=none");
    }
} else{
    $sessionManager->forbiddenAccess();
} 
