<?php
    session_start();

    $userAdmin = false;
    $userDev = false;
    $user = false;
    $userRole = '';

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
            $userDev = true;
            break;
        
        case "user":
            header("HTTP/1.1 403 Forbidden");
            include("../errors/403.html");
            exit();
    
        default:
            header("HTTP/1.1 403 Forbidden");
            include("../errors/403.html");
            exit();
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
                        Le plus valereux des 
                        <?php echo $_SESSION["userrole"]; ?>
                        !   
                    </h5>
                </div>

                <div class="triple-col spacing-last-projects ">

    <?php
        if($userAdmin){
    ?>

                    <div class="triple-col-1">
                        <div class="flex vertical-align">
                            <img src="/logma/ressources/img/AdminIcon.svg" alt="Accès au site Internet" class="size-icon">
                            <h2 class="color-white">Fonctions Admin :</h2>
                        </div>

                        <div class="flex mt-10">
                            <a href="./signup" class="container-link-cta color-white">
                            <p>Ajouter un compte</p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
    <?php
        }
    ?>
                    <div class="triple-col-2">
                        <div class="flex vertical-align">
                            <img src="/logma/ressources/img/AddIcon.svg" alt="Accès au site Internet" class="size-icon">
                            <h2 class="color-white">Ajouter </h2>
                        </div>

                        <div class="flex">
                            <a href="./gallery" class="container-link-cta color-white">
                            <p>Ajouter des images à la galerie </p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                    </div>
                    <div class="triple-col-3">
                        <div class="flex vertical-align">
                            <img src="/logma/ressources/img/WebIcon.svg" alt="Accès au site Internet" class="size-icon">
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

