<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing data 
    $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UFT-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UFT-8');

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handling and user signing up
    $login->loginUser();

    // Confirm login in url
    header("location: ../access-admin-logma?error=none");

}