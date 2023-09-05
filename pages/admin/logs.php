<?php
    session_start();
    
    $userAdmin = false;
    $userDev = false;
    $user = false;
    $userRole = '';

    $auto_logout_time = 1800; 
    $time = $_SERVER['REQUEST_TIME'];

    // Autologout
    if (isset($_SESSION['last_activity']) && ($time - $_SESSION['last_activity']) > $auto_logout_time) {
        include("../../includes/logout.inc.php");
        exit();
    }

    // Role checker
    if (isset($_SESSION["userrole"])) {
        $userRole = $_SESSION["userrole"];
    } else {
        header("HTTP/1.1 403 Forbidden");
        include("../errors/403.html");
        exit();
    }

    switch ($userRole) {
        case "admin":
            $userAdmin = true;
            break;
        
        case "dev":
            header("HTTP/1.1 401 Unauthorized");
            include("../errors/401.html");
            exit();
        
        case "user":
            header("HTTP/1.1 403 Forbidden");
            include("../errors/403.html");
            exit();

        default:
            header("HTTP/1.1 403 Forbidden");
            include("../errors/403.html");
            exit();
    }




    $logFile = '../../log/login_log.txt';

    if (file_exists($logFile)) {
        $logContent = file_get_contents($logFile);
    } else {
        $logContent = 'Log file not found.';
    }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logma/favicon.ico">

</head>

<body class="bg-color-black">
    <section class="">
            <div class="container h-full vertical-align object-center">

                <div>
                    <h1 class="color-white mt-100 mb-50 text-center">
                        Journal de logs
                        <span class="wrap"></span>
                    </h1>
                    <div class="flex mt-10 object-center">
                        <div class="absolute top-0 left-0 mb-10 pad-10">
                            <a href="/Logma/" class="container-link-cta color-white">
                                <p>Retour au dashboard </p>
                                <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
                    <pre class="color-white"><?php echo htmlspecialchars($logContent); ?></pre>
                </div>
            </div>
    </section>
</body>