<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../../css/main.css">
    
    <!-- Favicon -->
    <link rel="icon" href="../../favicon.ico">

</head>

<body class="bg-color-black ">
    <section class="h-full-screen">
        <div class="container h-full vertical-align object-center">
            <div>
                <div>
                    <h1 class="color-white">Se connecter :</h1>
                    <h1 class="color-white">Vous êtes connecté</h1>
                </div>
                <div>
                    <form action="../../includes/login.inc.php" method="post">
                        <input class="w-full input input-small bg-color-black color-white mb-10"  type="text" name="uid" placeholder="Nom d'utilisateur/E-mail...">
                        
                        <input class="w-full input input-small bg-color-black color-white"  type="password" name="pwd" placeholder="Mot de passe">
                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="login-submit">Se connecter</button>
                        </div>
                    </form>

                    <div>
                        <a href="./signup.php" class="container-contact color-white">
                        <p>Ajouter un compte admin </p>
                        <p class="container-contact-icon"> →</p>
                        </a>
                    </div>

                    
                    <form action="../../includes/logout.inc.php" method="post">
                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="logout-submit">Déconnexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

