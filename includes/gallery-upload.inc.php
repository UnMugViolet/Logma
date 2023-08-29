<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing data from form 
    $newFileName = $_POST['filename'];

    // Create default filename if empty
    if(empty($_POST['filename'])){
        $newFileName = "gallery";
    } 
    // Replace potential spaces with "-"
    else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }


    // Grabbing data from form 
    $imageTitle = $_POST["filetitle"];
    $projectName = $_POST["projectName"];

    // Grabbing data from file 
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileSize = $file['size'];


    // Extract extension
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("gif", "jpg", "jpeg", "png");

    // Check if extension is allowed
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0 ) {
            if($fileSize < 2000000){

                // Add id to avoid override
                $imageFullName = $newFileName . "." . uniqid("", false) . "." . $fileActualExt;
                $fileDestination = "../ressources/img/gallery/" . $imageFullName;

                // Database connexion
                include_once "../classes/dbh.classes.php";

                if(empty($imageTitle) || empty($projectName)) {
                    header("location: ../access-admin-logma/gallery?error=emptyinput");
                    exit();
                } 
                else {
                    $sql = 'SELECT * FROM gallery;';
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../access-admin-logma/gallery?error=stmtfailed");
                        exit();
                    }
                    else{
                        // Grab info from database
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);

                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO gallery (titleGallery, projectGallery,imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: ../access-admin-logma/gallery?error=stmtfailed");
                            exit();
                        } else {
                            // Success ! 
                            mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $projectName, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, $fileDestination);

                            header("location: ../access-admin-logma/gallery?error=none");
                        }
                    }
                }
            }
            else{
                header("location: ../access-admin-logma/gallery?error=filesize");
                exit();
            }
        }
        else{
            header("location: ../access-admin-logma/gallery?error=default");
            exit();
        }
    }
    else{
        header("location: ../access-admin-logma/gallery?error=filetype");
        exit();
    }


}