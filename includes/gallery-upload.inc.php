<?php
    include_once ("../classes/dbh.classes.php");
    include_once ("../classes/gallery.classes.php");
    include_once ("../classes/gallery-handler-contr.php");
    include_once ("./user-role-check.inc.php");


if($userAdmin || $userDev){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Grabbing data from form
        $imageTitle = $_POST["filetitle"];
        $fileSubtitle = $_POST["fileSubtitle"];
        $newFileName = $_POST['filename'];

        // Format the image name
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));

        // Create a Dbh instance and get the database connection
        $dbhInstance = new Dbh();
        $db = $dbhInstance->connect();

        $dbHandler = new ImageManagement();

        //Running error handlers 
        $uploadHandler = new UploadHandler();

        $uploadHandler->handleFileUpload($dbHandler, $imageTitle, $fileSubtitle, $newFileName);
    }
} else{
    $sessionManager->forbiddenAccess();
} 