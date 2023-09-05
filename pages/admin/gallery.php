<?php
    session_start();
    $userAdmin = isset($_SESSION["userrole"]) && $_SESSION["userrole"] === "admin" ;
    $userDev = isset($_SESSION["userrole"]) && $_SESSION["userrole"] === "dev";

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
    <link rel="icon" href="../favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen">
        <div class="container h-full vertical-align object-center">
            <!-- Logged -->
            <?php
                if($userAdmin || $userDev)
                {

            ?>
            <div>
                <div>
                    <h1 class="color-white">Télécharger des images.</h1>
                </div>
                <div class="input-size">
                    <form action="../includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="filetitle" placeholder="Titre..." class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input id="trigger" type="text" name="projectName" placeholder="Sous-titre..." class="flex w-full input input-small bg-color-black color-white mb-10">
                        
                        <p id="hidden" class="color-white text-center-left small-p mb-10">
                            Rappel : Pour garder l'esthétique du site il est préférable d'uploader les images par 3 ! 
                        </p>   
                        
                        <input type="file" name="file" class="flex color-white mt-30 vertical-align mb-10">
                        <input type="text" name="filename" placeholder="Nom du fichier... " class="flex w-full input input-small bg-color-black color-white mb-10">


                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="image-submit">Télécharger</button>
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

            <!-- Not logged -->
            <?php
                }
                else{
            ?>
            <div>
                <div>
                    <h1 class="color-white text-center">Accès refusé :)</h1>
                </div>
                <div>
                    <div class="flex mt-10 object-center">
                        <a href="../" class="container-link-cta color-white">
                        <p>Retour à la page d'accueil </p>
                        <p class="icon-link-cta"> →</p>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <!-- Error Modal -->
            <div id="errorModal" class="modal top-0 left-0 h-full w-full bg-faded-black">
                <div class="modal-content bg-color-white w-full flex-container vertical-align ">
                    <p id="modalText" class="">Text par défaut</p>
                    <span class="close color-main">&times;</span>
                </div>
            </div>

        </div>
    </section>

    
</body>

</html>