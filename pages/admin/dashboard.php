<?php
    session_start();
    $userAdmin = isset($_SESSION["userrole"]) && $_SESSION["userrole"] === "admin";

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
    <link rel="icon" href="../favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen">
            <?php
                if($userAdmin)
                {
                
            ?>
            <div class="container">
                <div>
                    <h1 class="color-white">
                        Bienvenue 
                        <?php echo $_SESSION["useruid"]; ?>
                        !   
                    </h1>
                </div>

                <div class="flex mt-10">
                    <a href="./signup" class="container-link-cta color-white">
                    <p>Ajouter un compte admin </p>
                    <p class="icon-link-cta"> →</p>
                    </a>
                </div>
                <div class="flex">
                    <a href="./gallery" class="container-link-cta color-white">
                    <p>Ajouter des images à la galerie </p>
                    <p class="icon-link-cta"> →</p>
                    </a>
                </div>
                <form action="../includes/logout.inc.php" method="post">
                    <div class="object-center mt-50">
                        <button type="submit" class="submit-cta" name="logout-submit">Déconnexion</button>
                    </div>
                </form>
            </div>



            <?php
                }
                else{
            ?>
            <div class="container h-full vertical-align object-center">
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
            </div>
            <?php
                }
            ?>
            
        </div>
    </section>

</body>

</html>

