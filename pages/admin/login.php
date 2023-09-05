<?php
    session_start();
    $userAdmin = isset($_SESSION["userrole"]) && $_SESSION["userrole"] === "admin";
    $userDev = isset($_SESSION["userrole"]) && $_SESSION["userrole"] === "dev";

    // Redirect user already logged in dashboard
    if ($userAdmin || $userDev) {
        header("Location: ./access-admin-logma/dashboard");
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
    <link rel="stylesheet" href="./css/main.css">

    <!-- JS -->
    <script src="./js/error/modal.error.js" type="module" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen">
            <div class="container h-full vertical-align object-center">
                <div>
                    <div>
                        <h1 class="color-white">Se connecter</h1>
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
            
            <!-- Error Modal -->
            <div id="errorModal" class="modal top-0 left-0 h-full w-full bg-faded-black">
                <div class="modal-content bg-color-white w-full flex-container vertical-align ">
                    <p id="modalText">Text par défaut</p>
                    <span class="close color-main">&times;</span>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

