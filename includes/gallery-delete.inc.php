<?php
require "../classes/dbh.classes.php";
require "../classes/gallery.classes.php";
require "../classes/gallery-handler-contr.php";
include_once('./user-role-check.inc.php');

if($userAdmin || $userDev){

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filename"])) {
        // Get the image file name to delete from the form input
        $imageFileNameToDelete = $_POST['filename'];

        // Create a Dbh instance and get the database connection
        $dbhInstance = new Dbh();
        $db = $dbhInstance->connect();

        // Create a DataHandler instance to manage database operations
        $dbHandler = new ImageManagement($db);

        if ($dbHandler->imageExists($imageFileNameToDelete)) {
            // Call the deleteImage method to delete the image
            $dbHandler->deleteImage($imageFileNameToDelete);

            // Redirect to a success page or display a success message
            header("location: ../galerie-photo?error=none");
            exit();
        } else {
            // Handle the case where the image doesn't exist
            header("location: ../galerie-photo?error=imagenotfound");
            exit();
        }
    }
} else{
    $sessionManager->forbiddenAccess();
} 