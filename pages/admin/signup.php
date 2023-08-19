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

<body class="bg-color-black">
    <section class="spacing-section">
        <div class="container vertical-align object-center mt-100">
            <div>
                <div>
                    <h1 class="color-white">Ajouter un compte</h1>
                </div>
                <div>
                    <form action="../../includes/signup.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Nom d'utilisateur" class="flex w-full input input-small bg-color-black color-white mb-10">
                        <input type="password" name="pwd" placeholder="Mot de passe" class="w-full input input-small bg-color-black color-white mb-10">
                        <input type="password" name="pwdrepeat" placeholder="Confirmation du mot de passe" class="w-full input input-small bg-color-black color-white mb-10">
                        <input type="text" name="email" placeholder="E-mail" class="w-full input input-small bg-color-black color-white">

                        <div class="object-center mt-50">
                            <button type="submit" class="submit-cta" name="signup-submit">Créer un compte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    $pwd =2;

    $passwordHashed = password_hash($pwd, PASSWORD_DEFAULT);

    echo $passwordHashed;
    ?>
</body>

</html>