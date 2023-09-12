<?php
    include_once('../../includes/user-role-check.inc.php');
    
    if ($userAdmin || $userDev) {
        $userHasAccess = true;
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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logma/favicon.ico">

</head>

<body class="bg-color-black">
    <section>
            <div class="container">
                <div class="mt-50 mb-50">
                    <h1 class="color-white text-left mb-10">
                        Bienvenue 
                        <?php echo $_SESSION["useruid"]; ?>
                        !   
                    </h1>
                    <h5 class="color-white">
                        Le plus valeureux des 
                        <?php echo $_SESSION["userrole"] .'s';?>
                        !   
                    </h5>

                </div>

                <div class="triple-col">

    <?php
        if($userAdmin){
    ?>
                    <div class="triple-col-1 mb-50">
                        <div class="flex vertical-align">
                            <img src="/logma/ressources/img/svg/AdminIcon.svg" alt="Accès au site Internet" class="size-icon">
                            <h2 class="color-white">Fonctions Admin :</h2>
                        </div>
                        
                        <div class="vertical-align">
                            <img src="../ressources/img/svg/LogsIcon.svg" alt="Voir les logs" class="size-small-icon">
                            <a href="./logs" class="container-link-cta color-white">
                            <p>Journal de logs</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        
                        <div class="vertical-align">
                            <img src="../ressources/img/svg/AddSimple.svg" alt="Ajouter un compte" class="size-small-icon">   
                            <a href="./signup" class="container-link-cta color-white">
                                <p>Ajouter un compte</p>
                                <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        
                        <div class="vertical-align">
                            <img src="../ressources/img/svg/Trash.svg" alt="Supprimer un compte" class="size-small-icon">
                            <a href="./delete-account" class="container-link-cta color-white">
                            <p>Supprimer un compte</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>

                        <div class="vertical-align">
                            <img src="../ressources/img/svg/MaintenanceIcon.svg" alt="Site en Maintenance" class="size-small-icon">
                            <a href="./maintenance" class="container-link-cta color-white">
                            <p>Mode maintenance</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
    <?php
        }
    ?>
                    <div class="triple-col-2 mb-50">
                        <div class="flex vertical-align">
                            <img src="/logma/ressources/img/svg/FeaturesIcon.svg" alt="Accès au fonctionnalités du site" class="size-icon">
                            <h2 class="color-white">Fonctionnalités </h2>
                        </div>

                        <div class="vertical-align">
                            <img src="../ressources/img/svg/AddPhotoGalleryIcon.svg" alt="Ajouter des images" class="size-small-icon">
                            <a href="./gallery" class="container-link-cta color-white">
                            <p>Ajouter des images à la galerie </p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
                  
                    <div class="triple-col-3 mb-50">
                        <div class="vertical-align">
                            <img src="/logma/ressources/img/svg/WebIcon.svg" alt="Accès au site Internet" class="size-icon">
                            <h2 class="color-white">Voir le site.</h2>
                        </div>

                        <div class="flex">
                            <a href="/Logma/" class="container-link-cta color-white">
                            <p>Homepage</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        <div class="flex">
                            <a href="/Logma/galerie-photo" class="container-link-cta color-white">
                            <p>Galerie photo</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        <div class="flex">
                            <a href="/Logma/contacts" class="container-link-cta color-white">
                            <p>Contacts</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        <div class="flex">
                            <a href="/Logma/cgu" class="container-link-cta color-white">
                            <p>CGU</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        <div class="flex">
                            <a href="/Logma/mentions-legales" class="container-link-cta color-white">
                            <p>Mentions Légales</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
            </div>


                <form action="../includes/logout.inc.php" method="post" class="object-center mt-50 ">
                    <div class="absolute-responsive bottom-0 mb-30 ">
                        <button type="submit" class="submit-cta" name="logout-submit">Déconnexion</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>

