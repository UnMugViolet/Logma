<?php 
include_once 'dbh.classes.php';

class ImageManagement extends Dbh {
    
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function insertGalleryRecord($imageTitle, $projectName, $imageFullName, $setImageOrder) {
        // Insert data into the database
        $sql = "INSERT INTO gallery (titleGallery, projectGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt) {
            header("location: ../access-admin-logma/gallery?error=stmtfailed");
            exit();
        } else {
            $stmt->bindParam(1, $imageTitle);
            $stmt->bindParam(2, $projectName);
            $stmt->bindParam(3, $imageFullName);
            $stmt->bindParam(4, $setImageOrder);

            if ($stmt->execute()) {
                // Redirect to a success page
                header("location: ../access-admin-logma/gallery?error=none");
            } else {
                header("location: ../access-admin-logma/gallery?error=stmtfailed");
                exit();
            }
        }
    }


    public function imageExists($imageFileName) {
        // Check if the image exists in the database
        $sql = "SELECT COUNT(*) FROM gallery WHERE imgFullNameGallery = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(1, $imageFileName);
            $stmt->execute();
            
            $count = $stmt->fetchColumn();

            return $count > 0;
        }

        return false; // Error occurred or image not found
    }

    public function deleteImage($imageFileName){
        $imageFileName = basename($imageFileName);

        // Delete the image file from the file system
        $fileToDelete = "../ressources/img/gallery/" . $imageFileName;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }

        // Delete the image record from the database
        $sql = "DELETE FROM gallery WHERE imgFullNameGallery = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(1, $imageFileName);
            $stmt->execute();
        }
    }

    public function getImageGallery(){
        $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt) {
            header("location: ./galerie-photo?error=stmtfailed");
            exit();
        } else {
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $images;
    }


}