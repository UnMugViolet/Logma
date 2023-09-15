<?php 
include_once ('dbh.classes.php');

class ProjectManagement extends Dbh {

    public function insertProjectRecord($projectTitle, $projectSubtitle, $projectUrl, $thumbnailFullName, $setImageOrder) {
        // Insert data into the database
        $sql = "INSERT INTO projects (project_title, project_subtitle, project_url, project_thumbnail_name, project_order) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt) {
            header("location: ../access-admin-logma/project?error=stmtfailed");
            exit();
        } else {
            $stmt->bindParam(1, $projectTitle);
            $stmt->bindParam(2, $projectSubtitle);
            $stmt->bindParam(3, $projectUrl);
            $stmt->bindParam(4, $thumbnailFullName);
            $stmt->bindParam(5, $setImageOrder);

            if ($stmt->execute()) {
                // Redirect to a success page
                header("location: ../access-admin-logma/project?error=none");
            } else {
                header("location: ../access-admin-logma/project?error=stmtfailed");
                exit();
            }
        }
    }


    public function projectExist($thumbnailFullName) {
        // Check if the image exists in the database
        $sql = "SELECT COUNT(*) FROM projects WHERE project_thumbnail_name = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(1, $thumbnailFullName);
            $stmt->execute();
            
            $count = $stmt->fetchColumn();

            return $count > 0;
        }

        return false; // Error occurred or image not found
    }

    public function deleteProject($thumbnailFullName){
        $thumbnailFullName = basename($thumbnailFullName);

        // Delete the image file from the file system
        $fileToDelete = "../ressources/img/projects/" . $thumbnailFullName;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }

        // Delete the image record from the database
        $sql = "DELETE FROM projects WHERE project_thumbnail_name = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(1, $thumbnailFullName);
            $stmt->execute();
        }
    }

    public function getProjectGallery(){
        $sql = "SELECT * FROM projects ORDER BY project_order DESC";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt) {
            header("location: /?error=stmtfailed");
            exit();
        } else {
            $stmt->execute();
            $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $projects;
    }


}