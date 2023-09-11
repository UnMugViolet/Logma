<?php
include_once('../config/config.php');
include_once('../config/authorized-ip.config.php');

    // Check if authorized Ip 
    function isAuthorizedIP($ip, $authorizedIPs) {
        return in_array($ip, $authorizedIPs);
    }
    
    // Check if the request is coming from an authorized IP address
    $clientIP = $_SERVER['REMOTE_ADDR'];

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the checkbox is checked
    $maintenanceMode = isset($_POST['maintenance']);

    // Check if the client IP is authorized
    if (!$maintenanceMode && !isAuthorizedIP($clientIP, $authorizedIPs)) {
        header("location: ../access-admin-logma/maintenance?error=stmt");
        exit();
    }

    // Update the maintenance mode status in config.php
    $configContents = '<?php $maintenanceMode = ' . var_export($maintenanceMode, true) . ';';
    file_put_contents('../config/config.php', $configContents, LOCK_EX);


    if ($maintenanceMode) {
        // Enable
        header("location: ../access-admin-logma/maintenance?error=none");
        exit();
    } else {
        // Disable
        header("location: ../access-admin-logma/maintenance?error=none");
        exit();
    }
}
