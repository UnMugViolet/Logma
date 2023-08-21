<?php
session_start();

include "../../includes/login.inc.php"
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="./css/main.css">
    
    <!-- Favicon -->
    <link rel="icon" href="./favicon.ico">

</head>

<body class="bg-color-black ">
    <section class="h-full-screen">
        <div class="container h-full vertical-align object-center">
            <div>
                <div>
                    <h1 class="color-white">Se connecter :</h1>
                </div>
                <div>
                    <form action="./includes/login.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Nom d'utilisateur/E-mail..." class="flex w-full input input-small input-min-size bg-color-black color-white mb-10">
                        <input type="password" name="pwd" placeholder="Mot de passe" class="flex w-full input input-small input-min-size bg-color-black color-white">

                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="login-submit">Se connecter</button>
                        </div>
                    </form>
                    <form action="./includes/logout.inc.php" method="post">
                            <div class="object-center mt-50">
                                <button type="submit" class="submit-cta" name="logout-submit">Déconnexion</button>
                            </div>
                        </form>


                    <?php
                        if(isset($_SESSION["userid"]))
                        {
                        echo 
                        '                    

                        <a href="./access-admin-logma/signup" class="container-link-cta color-white">
                                <div class="flex">
                            <p>Ajouter un compte admin </p>
                            <p class="icon-link-cta"> →</p>
                            </a>
                        </div>
                        ';
                        print_r($_SESSION["userid"]);
                        }
                        
                        else{}
                    ?>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

