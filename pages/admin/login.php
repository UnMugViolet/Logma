<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">
    

    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section>
        <div>
            <?php
                require "../../components/header.php"
            ?>
        </div>
    </section>

    <section class="spacing-section">
        <div class="container h-quarter-screen vertical-align object-center">
            <div class="spacing-title">
                <div>
                    <h1 class="color-white">Se connecter :</h1>
                    <h1 class="color-white">Vous êtes connecté</h1>
                </div>
                <div>
                    <form action="includes/login.inc.php" method="post">
                        <input class="w-full input input-small bg-color-black color-white"  type="text" name="uid" placeholder="Nom d'utilisateur/E-mail...">
                        <p class="color-white"><?php if(isset($email_error)) echo $email_error; ?></p>
                        
                        <input class="w-full input input-small bg-color-black color-white"  type="password" name="pwd" placeholder="Mot de passe">
                        <p class="color-white"><?php if(isset($subject_error)) echo $subject_error; ?></p>
                        <div class="object-center spacing-button">
                            <button type="submit" class="submit-cta" name="login-submit">Se connecter</button>
                        </div>
                    </form>

                    <div>
                        <a href="signup.php" class="container-contact color-white">
                        <p>Ajouter un compte admin </p>
                        <p class="container-contact-icon"> →</p>
                        </a>
                    </div>


                    <form action="includes/logout.inc.php" method="post">
                        <div class="object-center spacing-button">
                            <button type="submit" class="submit-cta" name="logout-submit">Déconnexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
        require "../../components/footer.php"
    ?>
</body>

</html>

