<?php
    include_once('../../includes/user-role-check.inc.php');
    include_once('../../config/config.php');
    include_once('../../includes/maintenance.inc.php');

    if ($userAdmin) {
        $userHasAccess = true;
    } elseif($userDev) {
        $sessionManager->notAllowed();
    } else{
        $sessionManager->forbiddenAccess();
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->
    <script src="../js/components/trigger-maintenance.js" type="module" defer></script>
    <script src="../js/error/modal.error.js" type="module" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logma/favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen-responsive">
        <div class="container h-full vertical-align object-center">
            <div>
                <div class="block container icon-error mt-50 mb-50">
                    <img src="/logma/ressources/img/svg/MaintenanceIcon.svg" alt="Erreur 404">
                </div>
                <div>
                    <h1 class="color-white text-center mb-30 mt-30">Mode maintenance.</h1>
                </div>
                <div class="input-size mb-100 mt-100">

                <form action="../includes/maintenance.inc.php" method="post">

                    <input type="hidden" name="form_identifier" value="maintenance_form">

                    <div class="vertical-align">
                        <h5 class="color-white w-trois-quart">Mettre le site en maintenance :</h5>
                        <input type="checkbox" name="maintenance" class="checkbox"" <?php if ($maintenanceMode) echo 'checked'; ?>>
                    </div>

                    <div class="object-center mt-50">
                        <button type="submit" class="submit-cta" name="submit">Save</button>
                    </div>
                </form>


                </div>
                <div class="flex mt-10">
                    <a href="./dashboard" class="container-link-cta color-white">
                    <p>Retour au Dashboard </p>
                    <p class="icon-link-cta"> →</p>
                    </a>
                </div>
            </div>
            
            <!-- Error Modal -->
            <div id="errorModal" class="error-modal top-0 left-0 h-full w-full bg-faded-black">
                <div class="modal-error-content bg-color-white w-full flex-container vertical-align ">                    
                    <p id="modalText" class="">Text par défaut</p>
                    <span class="close-error color-main">&times;</span>
                </div>
            </div>
        </div>
    </section>

    
</body>

</html>