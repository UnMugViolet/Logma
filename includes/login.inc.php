<?php 

if(isset($_POST["submit"]))
{
    // Grabbing data 
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handling and user signing up
    $login->loginUser();

    header("location: ../../login.php?error=none");

}