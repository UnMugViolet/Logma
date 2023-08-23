<?php
    session_start();
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

<body class="bg-color-black">
    <section class="h-full-screen">
            <?php
                if(isset($_SESSION["userid"]))
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
                    <a href="./access-admin-logma/signup" class="container-link-cta color-white">
                    <p>Ajouter un compte admin </p>
                    <p class="icon-link-cta"> →</p>
                    </a>
                </div>
                <form action="./includes/logout.inc.php" method="post">
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
                        <h1 class="color-white">Se connecter :</h1>
                    </div>
                    <div>
                        <form action="./includes/login.inc.php" method="post">
                            <input type="text" name="uid" placeholder="Nom d'utilisateur/E-mail..." class="flex w-full input input-small input-size bg-color-black color-white mb-10">
                            <input type="password" name="pwd" placeholder="Mot de passe" class="flex w-full input input-small input-size bg-color-black color-white">

                            <div class="object-center mt-50">
                                <button type="submit" class="submit-cta" name="login-submit">Se connecter</button>
                            </div>
                        </form>


                </div>
            </div>
            <?php
                }
            ?>

        </div>
    </section>

</body>

</html>

