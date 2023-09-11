<?php
    include_once('../../includes/user-role-check.inc.php');
    
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
    <title>Connexion | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->
    <script src="../js/components/hide-content.js" type="text/javascript" defer></script>
    <script src="../js/error/modal.error.js" type="module" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logma/favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen-responsive">
        <div class="container h-full vertical-align object-center">
            <div>
                <div class="block container icon-error mt-50 mb-50">
                    <img src="/logma/ressources/img/svg/AddAccountIcon.svg" alt="Erreur 404">
                </div>
                <div>
                    <h1 class="color-white">Ajouter un compte.</h1>
                </div>
                <div class="input-size">
                    <form action="../includes/signup.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Nom d'utilisateur" class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input id="trigger" type="password" name="pwd" placeholder="Mot de passe" class="w-full input input-small bg-color-black color-white mb-10">
                       
                        <p id="hidden" class="color-white text-center-left small-p mb-10">Le mot de passe doit contenir au minimum 16 caractères, majuscule et minuscule ainsi que 2 caractères spéciaux</p>                      
                       
                        <input type="password" name="pwdrepeat" placeholder="Confirmation du mot de passe" class="w-full input input-small bg-color-black color-white mb-10">
                        <input type="text" name="email" placeholder="E-mail" class="w-full input input-small bg-color-black color-white mb-10">

                        <select name="userrole" class="w-full input input-small bg-color-black color-white mb-10">
                            <option value="admin">Admin</option>
                            <option value="dev">Dev</option>
                            <option value="user">User</option>
                        </select>
                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="signup-submit">Créer un compte</button>
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