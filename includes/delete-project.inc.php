<?php
include_once ('../classes/dbh.classes.php');
include_once ('../classes/project.classes.php');
include_once ('../classes/project-handler.classes.php');
include_once('./user-role-check.inc.php');


if($userAdmin || $userDev){

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["thumbnailName"])) {
        // Get the image file name to delete from the form input
        $thumbnailFullName = $_POST['thumbnailName'];

        // Create a Dbh instance and get the database connection
        $dbhInstance = new Dbh();
        $db = $dbhInstance->connect();

        // Create a DataHandler instance to manage database operations
        $dbHandler = new ProjectManagement();

        if ($dbHandler->projectExist($thumbnailFullName)) {
            // Call the deleteImage method to delete the image
            $dbHandler->deleteProject($thumbnailFullName);

            // Redirect to a success page or display a success message
            header("location: /?error=none");
            exit();
        } else {
            // Handle the case where the image doesn't exist
            header("location: /?error=imagenotfound");
            exit();
        }
    }
} else{
    $sessionManager->forbiddenAccess();
} 