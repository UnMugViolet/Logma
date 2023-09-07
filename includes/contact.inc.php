<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

    require "../classes/contact.classes.php";

    sleep(1);

    $contact = new Contact($name, $subject, $email, $message);

    $contact->sendContactInfo();
    
}