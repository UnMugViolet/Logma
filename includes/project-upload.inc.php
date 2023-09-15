<?php
include_once ("../classes/dbh.classes.php");
include_once ("../classes/project.classes.php");
include_once ("../classes/project-handler.classes.php");
include_once ('./user-role-check.inc.php');


if($userAdmin || $userDev){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Grabbing data from form
    $projectTitle = $_POST['projectTitle'];
    $projectSubtitle = $_POST['projectSubtitle'];
    $projectUrl = $_POST['projectUrl'];
    $newThumbnailName = $_POST['thumbnailFullName'];


    // Format the image name
    $newThumbnailName = strtolower(str_replace(" ", "-", $newThumbnailName));

    // Create a Dbh instance and get the database connection
    $dbhInstance = new Dbh();
    $db = $dbhInstance->connect();

    $projectHandler = new ProjectManagement();

    //Running error handlers 
    $uploadHandler = new ProjectUpload();

    $uploadHandler->handleFileUpload($projectHandler, $projectTitle, $projectSubtitle, $projectUrl, $newThumbnailName);
}
} else{
$sessionManager->forbiddenAccess();
} 