<?php
    require "../classes/dbh.classes.php";
    require "../classes/gallery.classes.php";
    require "../classes/gallery-handler-contr.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Grabbing data from form
    $newFileName = $_POST['filename'];
    $imageTitle = $_POST["filetitle"];
    $projectName = $_POST["projectName"];

    // Format the image name
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));

    // Create a Dbh instance and get the database connection
    $dbhInstance = new Dbh();
    $db = $dbhInstance->connect();

    $dbHandler = new ImageManagement();

    //Running error handlers 
    $uploadHandler = new UploadHandler();

    $uploadHandler->handleFileUpload($dbHandler, $imageTitle, $projectName, $newFileName);
}