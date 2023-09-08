<?php

include_once 'dbh.classes.php';

class UserManager extends Dbh{

    public function getUsers() {
        $sql = "SELECT * FROM users ORDER BY users_id";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute()) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $userObjects = [];
            foreach ($users as $user) {
                // Create User objects and add them to the array
                $userObjects[] = new User($user['users_id'], $user['users_uid'], $user['users_email'], $user['users_role']);
            }

            return $userObjects;
        } else {
            header("location: ../access-admin-logma/delete-account?error=stmtfailed");
            exit();
        }
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE users_id = :id";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(":id", $userId);

        if ($stmt->execute()) {
            header("location: ../access-admin-logma/delete-account?error=none");
            exit();
        } else {
            header("location: ../access-admin-logma/delete-account?error=stmtfailed");
            exit();
        }
    }
}
