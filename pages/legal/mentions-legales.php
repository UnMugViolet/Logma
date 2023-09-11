<?php
    include_once('../../includes/user-role-check.inc.php');
    include_once('../../includes/maintenance.inc.php');

    if ($userAdmin || $userDev || $user || $notUser) {
        $userHasAccess = true;
    } else{
        $sessionManager->forbiddenAccess();
    } 
    
    // Check Maintenance
    if ($maintenanceMode && !isAuthorizedIP($clientIP, $authorizedIPs)) {
        $sessionManager->maintenanceMode();
      }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

</head>

<body >
    <section>
        <?php
            include_once "../../components/header.php"
        ?>
    </section>

    <section>
        <h1>Mentions légales</h1>
    </section>

    <?php
        include_once "../../components/footer.php"
    ?>
</body>

</html>