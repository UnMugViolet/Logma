<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{    
    sleep(2);

    if (isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];
        $userManager->deleteUser($userId);
    } else {
        header("Location: ../access-admin-logma/delete-account?error=missinguserid");
        exit();
    }
}
