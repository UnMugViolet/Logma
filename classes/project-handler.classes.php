<?php

class ProjectUpload
{
    public function handleFileUpload($projectHandler, $projectTitle, $projectSubtitle, $projectUrl, $newThumbnailName)
    {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileTempName = $file['tmp_name'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("gif", "jpg", "jpeg", "png", "webp");

        if(empty($newThumbnailName) || empty($file) || empty($projectTitle) || empty($projectSubtitle) || empty($projectUrl)){
            $this->redirectToProject("emptyinput");
            exit();
        }

        if (!in_array($fileActualExt, $allowed)) {
            $this->redirectToProject("filetype");
            exit();
        }

        if ($fileError !== 0) {
            $this->redirectToProject("default");
            exit();
        }

        if ($fileSize >= 2000000) {
            $this->redirectToProject("filesize");
            exit();
        }
        

            // Generate a unique image name
            $thumbnailFullName = $newThumbnailName . "." . $fileActualExt;
            $fileDestination = "../ressources/img/projects/" . $thumbnailFullName;

            // Calculate $setImageOrder by calling the calculateImageOrder method
            $setImageOrder = $this->calculateImageOrder($projectHandler);

            // Insert data into the database
            $projectHandler->insertProjectRecord($projectTitle, $projectSubtitle, $projectUrl, $thumbnailFullName, $setImageOrder, $fileDestination);

            // Move the uploaded file to its destination
            move_uploaded_file($fileTempName, $fileDestination);
    }



    private function redirectToProject($errorType)
    {
        header("location: ../access-admin-logma/project?error=$errorType");
        exit();
    }

    private function calculateImageOrder($dbHandler)
    {
        // Prepare SQL statement to count rows in the 'gallery' table
        $sql = 'SELECT * FROM projects;';
        $stmt = $dbHandler->connect()->prepare($sql);

        if (!$stmt) {
            $this->redirectToProject("stmtfailed");
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
}