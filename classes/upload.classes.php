<?php 

class DataHandler extends Dbh{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    protected function insertGalleryRecord($imageTitle, $projectName, $imageFullName, $setImageOrder, $fileDestination) {
        // Insert data into the database
        $sql = "INSERT INTO gallery (titleGallery, projectGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
        $stmt = $this->conn->prepare($sql);

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

    // Add a method to get the database connection
    protected function getDatabaseConnection() {
        return $this->conn;
    }
}