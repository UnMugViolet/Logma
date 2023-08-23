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
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->
    <script src="../js/components/hide-content.js" type="text/javascript" defer></script>

    <!-- Favicon -->
    <link rel="icon" href="../favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen">
        <div class="container h-full vertical-align object-center">
            <?php
                if(isset($_SESSION["userid"]))
                {
            ?>
            <div>
                <div>
                    <h1 class="color-white">Ajouter un compte</h1>
                </div>
                <div class="input-size">
                    <form action="../includes/signup.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Nom d'utilisateur" class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input id="trigger" type="password" name="pwd" placeholder="Mot de passe" class="w-full input input-small bg-color-black color-white mb-10">
                       
                        <p id="hidden" class="color-white text-center-left small-p mb-10">Le mot de passe doit contenir au minimum 20 caractères, majuscule et minuscule ainsi que 2 caractères spéciaux</p>                      
                       
                        <input type="password" name="pwdrepeat" placeholder="Confirmation du mot de passe" class="w-full input input-small bg-color-black color-white mb-10">
                        <input type="text" name="email" placeholder="E-mail" class="w-full input input-small bg-color-black color-white">

                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="signup-submit">Créer un compte</button>
                        </div>
                    </form>
                </div>
                <div class="flex mt-10">
                    <a href="../access-admin-logma" class="container-link-cta color-white">
                    <p>Retour à la page de connection </p>
                    <p class="icon-link-cta"> →</p>
                    </a>
                </div>
            </div>
            
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

        </div>
    </section>

    
</body>

</html>