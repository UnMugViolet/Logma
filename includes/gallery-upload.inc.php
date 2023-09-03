<?php
    require "../classes/dbh.classes.php";
    require "../classes/upload.classes.php";
    require "../classes/upload-handler-contr.php";


    $dbhInstance = new Dbh();
    $conn = $dbhInstance->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Grabbing data from form
    $newFileName = $_POST['filename'];

    if (empty($_POST['filename'])) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $imageTitle = $_POST["filetitle"];
    $projectName = $_POST["projectName"];


    $dbHandler = new DataHandler($conn);

    //Running error handlers 
    $uploadHandler = new UploadHandler();

    $uploadHandler->handleFileUpload($dbHandler, $imageTitle, $projectName, $newFileName);
}