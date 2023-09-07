<?php
    include_once('../../includes/user-role-check.inc.php');

    if ($userAdmin) {
        $userHasAccess = true;
    } elseif($userDev) {
        $sessionManager->notAllowed();
    } else{
        $sessionManager->forbiddenAccess();
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
                        <div class="absolute top-0 right-0 mb-10 pad-20">
                            <a href="./dashboard" class="container-link-cta color-white">
                                <p>Retour au dashboard </p>
                                <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
                    <pre class="color-white logs-typo"><?php echo htmlspecialchars($logContent); ?></pre>
                </div>
            </div>
    </section>
</body>