<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Propos | Logma </title>

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
    <section class="bg-image-layout bg-image-mountains">
            <?php
                include_once "../../components/header.php"
            ?>
    </section>
    <section class="spacing-section bg-color-white">
        <div class="container spacing-section">
            <p>
                Dans ce monde qui va si vite, nous on prend le temps. Le temps de répondre aux besoins de chaque client, chaque projet. 
            </p>
            <p>
                Aujourd’hui nous sommes en tournage pour MD surfboards, 1er créateur de planche de surf biosourcés, demain nous tournons pour Nohé, une marque de vêtements qui transporte leurs produits à la voile et après-demain nous partons réaliser un reportage sur l’accès à l’éducation au Maroc. La diversité, les rencontres ! Voilà ce qui nous plaît le plus au-delà des tournages. 
            </p>
            <p>
                Vous pouvez nous confier l’identité de votre marque, entreprises, projet, vous pouvez être certains d’une chose c’est que l’on donnera tout pour créer les images qui vous ressemblent, prête à être diffusés.
            </p>
        </div>
        <div class="button-center-disposition">
            <a href="./contacts" class="second-cta ">
                UN PROJET ? LET’S GO.
            </a>
        </div>
    </section>
    
    <?php
     include_once "../../components/footer.php"
    ?>
</body>

</html>