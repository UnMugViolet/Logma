<?php
    include_once('../../includes/user-role-check.inc.php');
    include_once ('../../classes/users-manager.classes.php');
    include_once ('../../classes/user.classes.php');
    include_once ('../../view/triple-column.view.php');

    if ($userAdmin) {
        $userHasAccess = true;
    } elseif($userDev) {
        $sessionManager->notAllowed();
    } else{
        $sessionManager->forbiddenAccess();
    }

    // Create an instance of the UserManager class and display all users
    $userManager = new UserManager();
    $users = $userManager->getUsers();

    $userDisplay = new UserDisplay($users);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un compte | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->
    <script src="../js/modal/delete-account.modal.js" type="text/javascript" defer></script>
    <script src="../js/error/modal.error.js" type="module" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen-responsive">
        <div class="container h-full vertical-align object-center">
            <div class="card-min-size">

                <div class="block container icon-error mt-50 mb-50">
                    <img src="/ressources/img/svg/DeleteAccountIcon.svg" alt="Erreur 404">
                </div>
                <div>
                    <h1 class="color-white text-center mb-20">Supprimer un compte.</h1>
                </div>
                    <div>
                    <?php
                    // Display user cards
                    $userDisplay->displayContent($users);
                    ?>
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