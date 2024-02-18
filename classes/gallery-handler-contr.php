<?php

class UploadHandler 
{
    public function handleFileUpload($dbHandler, $imageTitle, $projectName, $newFileName)
    {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileTempName = $file['tmp_name'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("gif", "jpg", "jpeg", "png", "webp");

        if(empty($newFileName) || empty($file) || empty($imageTitle) || empty($projectName)) {
            $this->redirectToGallery("emptyinput");
            exit();
        }

        if (!in_array($fileActualExt, $allowed)) {
            $this->redirectToGallery("filetype");
            exit();
        }

        if ($fileError !== 0) {
            $this->redirectToGallery("default");
            exit();
        }

        if ($fileSize >= 2000000) {
            $this->redirectToGallery("filesize");
            exit();
        }
        

            // Generate a unique image name
            $imageFullName = $newFileName . "." . uniqid("", false) . "." . $fileActualExt;
            $fileDestination = "../ressources/img/gallery/" . $imageFullName;

            // Calculate $setImageOrder by calling the calculateImageOrder method
            $setImageOrder = $this->calculateImageOrder($dbHandler);

            // Insert data into the database
            $dbHandler->insertGalleryRecord($imageTitle, $projectName, $imageFullName, $setImageOrder, $fileDestination);

            // Move the uploaded file to its destination
            move_uploaded_file($fileTempName, $fileDestination);
    }



    private function redirectToGallery($errorType)
    {
        header("location: ../access-admin-logma/gallery?error=$errorType");
        exit();
    }

    private function calculateImageOrder($dbHandler)
    {
        // Prepare SQL statement to get the last inserted ID
        $sql = 'SELECT MAX(orderGallery) FROM gallery;';
        $stmt = $dbHandler->connect()->prepare($sql);

        if (!$stmt) {
            $this->redirectToGallery("stmtfailed");
            return;
        }

        // Execute the SQL query
        $stmt->execute();

        // Get the maximum ID (last inserted ID)
        $maxOrder = $stmt->fetchColumn();

        // Calculate the new $setImageOrder
        return $maxOrder + 1;
    }
}