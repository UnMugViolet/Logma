<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing data 
    $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');

    require "../classes/dbh.classes.php";
    require "../classes/login.classes.php";
    require "../classes/login-contr.classes.php";
    
    sleep(2);

    $login = new LoginContr($uid, $pwd);

    // Running error handling and user signing up
    $login->loginUser();

    // Confirm login in url
    header("location: ../access-admin-logma/dashboard?error=none");

}