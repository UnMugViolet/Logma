<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">
    

    <!-- JS -->
    <script src="./js/components/header.js" type="text/javascript"></script>
    <script src="./js/components/footer.js" type="text/javascript"></script>
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section>
        <div>
            <header-component/>
        </div>
    </section>

    <section class="spacing-section">
        <div class="container h-half-screen vertical-align object-center">
            <div class="">
                <div>
                    <h1 class="color-white">Se connecter :</h1>
                </div>
                <div>
                    <form action="includes/login.inc.php" method="post">
                        <input class="w-full input input-small bg-color-black color-white"  type="text" name="mailuid" placeholder="Nom d'utilisateur/E-mail...">
                        <p class="color-white"><?php if(isset($email_error)) echo $email_error; ?></p>
                        
                        <input class="w-full input input-small bg-color-black color-white"  type="text" placeholder="Mot de passe">
                        <p class="color-white"><?php if(isset($subject_error)) echo $subject_error; ?></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer-component/>
</body>

</html>

