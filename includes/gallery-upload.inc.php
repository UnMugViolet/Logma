<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{           
    // Grabbing data     
    $imageTitle = $_POST["filetitle"];
    $imageCity = $_POST["city"];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];



    require "../classes/dbh.classes.php";
    require "../classes/gallery.classes.php";
    require "../classes/gallery-contr.classes.php";  
    
    $upload = new UploadContr($imageTitle, $imageCity, $fileName, $fileSize, $fileError);

    //Running error handlers and user signup
    $upload->uploadImage();

    // Going back to gallert
    header("location: ../access-admin-logma/gallery?error=none");
}