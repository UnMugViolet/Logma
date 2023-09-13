<?php

$includePathsConfig = [
    './config/',
    '../config/',
    '../../config/',
];
$includePathsClasses = [
    './classes/',
    '../classes/',
    '../../classes/',
];


function include_once_multiple_paths($paths, $file) {
    foreach ($paths as $path) {
        $fullPath = $path . $file;
        if (file_exists($fullPath)) {
            include_once($fullPath);
            return;
        }
    }
}

include_once_multiple_paths($includePathsClasses, 'dbh.classes.php');
include_once_multiple_paths($includePathsClasses, 'maintenance-mode-manager.classes.php');
include_once_multiple_paths($includePathsConfig, 'config.php');
include_once('./user-role-check.inc.php');


// Create an instance of MaintenanceModeManager
$maintenanceManager = new MaintenanceModeManager('../config/config.php');
if($userAdmin){

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_identifier']) && $_POST['form_identifier'] === 'maintenance_form') {
        // Check if the checkbox is checked
        $maintenanceMode = isset($_POST['maintenance']);
    
        // Check if the client IP is authorized
        if (!$maintenanceManager->isAuthorizedIP($clientIP)) {
            // Redirect unauthorized IP addresses
            header("location: ../access-admin-logma/maintenance?error=ipnotauthorized");
            exit();
        }
    
        // Toggle maintenance mode based on the checkbox
        $maintenanceManager->toggleMaintenanceMode($maintenanceMode);
    }
} else{
    $sessionManager->forbiddenAccess();
} 



