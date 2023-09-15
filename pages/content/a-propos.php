<?php
  include_once('../../includes/user-role-check.inc.php');
  include_once('../../includes/maintenance.inc.php');

  if ($userAdmin || $userDev || $user || $notUser) {
    $userHasAccess = true;
  } else {
    $sessionManager->forbiddenAccess();
  }
  
    // Check Maintenance
    $maintenanceManager = new MaintenanceModeManager('../../config/config.php');

    if ($maintenanceManager->isMaintenanceModeActive()) {
        if ($maintenanceManager->isAuthorizedIP()) {
            $maintenanceManager->displayMaintenanceOnBanner();
        } else {
            $sessionManager->maintenanceMode();
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Propos | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    
    <!-- Open Graph -->
    <meta property="og:title" content="Nous connaitre | Logma Production">
    <meta property="og:description" content="Plus qu'un travail, une vocation. Notre passion guide chaque image que nous créons. Nous transformons l'inspiration en vidéos captivantes.">
    <meta property="og:country-name" content="France">
    <meta property="og:image" content="./ressources/img/logo-logma.webp"> 
    <meta property="og:url" content="https://www.logma-production.com/a-propos">
    <meta property="og:type" content="website">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.logma-production.com/a-propos">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Nous connaitre  | Logma Production">
    <meta property="og:description" content="Plus qu'un travail, une vocation. Notre passion guide chaque image que nous créons. Nous transformons l'inspiration en vidéos captivantes.">
    <meta property="og:image" content="https://logma-production.com/ressources/img/logo-logma-black.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="logma-production.com">
    <meta property="twitter:url" content="https://www.logma-production.com/a-propos">
    <meta name="twitter:title" content="Nous connaitre  | Logma Production">
    <meta name="twitter:description" content="Plus qu'un travail, une vocation. Notre passion guide chaque image que nous créons. Nous transformons l'inspiration en vidéos captivantes.">
    <meta name="twitter:image" content="https://logma-production.com/ressources/img/logo-logma-black.webp">

    <!-- Tags -->
    <link rel="canonical" href="https://www.logma-production.com/a-propos" />
    <meta name="description" content="Plus qu'un travail, une vocation. Notre passion guide chaque image que nous créons. Nous transformons l'inspiration en vidéos captivantes." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow"/>


</head>

<body class="bg-color-black">
    <section class="bg-image-info bg-image-mountains">
            <?php
                include_once "../../components/header.php"
            ?>

    </section>
    <section class="spacing-section bg-color-white">

        <div class="container">
            <div>
                <h1 >A propos.</h1>
            </div>
            <div class="dual-col vertical-align">
                <div class="dual-col-1 ">
                    <h2>Un petit mot sur nous...</h2>
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
                <div class="dual-col-2">
                    <img src="./ressources/img/photo-baptiste-fablet.webp" alt="photo du gérant de Logma Production">
                </div>
            </div>
            


        </div>
        <div class="object-center mt-100 mb-50">
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