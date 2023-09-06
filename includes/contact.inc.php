<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

    sleep(1);

    if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
        header("location: ../contacts?error=username");
    }
    if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
        header("location: ../contacts?error=invalidsubject");
    }
    if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
        header("location: ../contacts?error=email");
    }
    if(strlen($message) === 0){
        header("location: ../contacts?error=emptyinput");
    }
}