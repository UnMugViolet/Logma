<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Photo | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">
    
    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section class="mb-100">
            <?php
                include_once "../../components/header.php"
            ?>
    </section>
    <section class="w-full pad-10 ">
        <div class="triple-col spacing-last-projects">
            <span class="triple-col-1">
                <div>
                    <img src="./ressources/img/shooting-de-marque.jpg">
                </div>
                <h4 class="color-white">Shooting de marque</h4>
                <h5 class="color-white">MAROC</h5>
            </span>
            <span class="triple-col-2">
                <div>
                    <img src="./ressources/img/interview-mike-horn.jpg">
                </div>
                <h4 class="color-white">Interview Mike Horn</h4>
                <h5 class="color-white">PARIS</h5>
            </span>
            <span class="triple-col-3">
                <div>
                    <img src="./ressources/img/shooting-route-du-rhum.jpg">
                </div>
                <h4 class="color-white">Route du Rhum 2022</h4>
                <h5 class="color-white">SAINT-MALO</h5>
            </span>
        </div>
    </section>
    <?php
        include_once "../../components/footer.php"
    ?>
</body>

</html>

