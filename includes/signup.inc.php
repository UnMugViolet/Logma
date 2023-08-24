<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UFT-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UFT-8');
    $pwdRepeat = htmlspecialchars($_POST["pwdrepeat"], ENT_QUOTES, 'UFT-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UFT-8');

    // Instantiaite SignupContr class
    require "../classes/dbh.classes.php";
    require "../classes/signup.classes.php";
    require "../classes/signup-contr.classes.php";

    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);
    
    //Running error handlers and user signup
    $signup->signupUser();

    // Going back to login
    header("location: ../access-admin-logma/signup?error=none");
}