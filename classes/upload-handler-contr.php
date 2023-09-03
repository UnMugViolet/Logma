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

        $allowed = array("gif", "jpg", "jpeg", "png");

        if(empty($file) || empty($imageTitle) || empty($projectName)) {
            header("location: ../access-admin-logma/signup?error=emptyinput");
            exit();
        }

        if (!in_array($fileActualExt, $allowed)) {
            $this->redirectToGallery("filetype");
            return;
        }

        if ($fileError !== 0) {
            $this->redirectToGallery("default");
            return;
        }

        if ($fileSize >= 2000000) {
            $this->redirectToGallery("filesize");
            return;
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

    private function calculateImageOrder($dbHandler)
    {
        // Prepare SQL statement to count rows in the 'gallery' table
        $sql = 'SELECT * FROM gallery;';
        $stmt = $dbHandler->getDatabaseConnection()->prepare($sql);

        if (!$stmt) {
            $this->redirectToGallery("stmtfailed");
            return;
        }

        // Execute the SQL query
        $stmt->execute();

        // Get the result set and count rows
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rowCount = count($result);

        // Calculate the new $setImageOrder
        return $rowCount + 1;
    }

    private function redirectToGallery($errorType)
    {
        header("location: ../access-admin-logma/gallery?error=$errorType");
        exit();
    }
}