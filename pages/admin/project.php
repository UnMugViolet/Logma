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
    <title>Ajouter un projet | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->
    <script src="../js/components/hide-content.js" type="text/javascript" defer></script>
    <script src="../js/error/modal.error.js" type="module" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen-responsive">
        <div class="container h-full vertical-align object-center">
            <div>
                <div class="block container icon-error mt-50 mb-50">
                    <img src="/ressources/img/svg/ProjectIcon.svg" alt="Télécharger une image">
                </div>
                <div>
                    <h1 class="color-white">Ajouter un projet.</h1>
                </div>
                <div class="input-size">
                    <form action="../includes/project-upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="projectTitle" placeholder="Titre..." class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input type="text" name="projectSubtitle" placeholder="Sous-titre..." class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input type="text" name="projectUrl" placeholder="Lien du projet..." class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input type="file" name="file" class="flex color-white mt-30 vertical-align mb-10">
                        <input id="trigger" type="text" name="thumbnailFullName" placeholder="Nom de la miniature... " class="flex w-full input input-small bg-color-black color-white mb-10">
                                                
                        <p id="hidden" class="color-white text-center-left small-p mb-10">
                            Rappel : Pour garder l'esthétique du site il est préférable d'uploader les projets par 3 ! 
                        </p>   

                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="image-submit">Ajouter le projet</button>
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