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
        <div class="button-center-disposition mb-50">
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