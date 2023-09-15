<?php
    include_once('./includes/user-role-check.inc.php');
    include_once('./classes/project.classes.php');
    include_once ('./view/triple-column.view.php');
    include_once('./includes/maintenance.inc.php');

    if ($userAdmin || $userDev || $user || $notUser) {
        $userHasAccess = true;
    } else{
        $sessionManager->forbiddenAccess();
    } 

    $projectItems = new ProjectManagement();
    $projects = $projectItems->getProjectGallery();

    $projectDisplay = new ProjectDisplay($projectItems);

    // Check Maintenance
    $maintenanceManager = new MaintenanceModeManager('./config/config.php');

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
    <title>Accueil | Logma</title>
    <meta name="description" content="Description de la page">

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    <script src="./js/components/typewirter.js" type="text/javascript" defer></script>
    <script src="./js/error/modal.error.js" type="module" defer></script>
    <script src="./js/modal/delete-image.modal.js" type="text/javascript" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="canonical" href="https://www.logma-production.com/" />
    <meta property="og:description"
        content="Derniers projets NOHÉ CAMPAGNE PLATYPUS CRAFT DIGITAL TRANSAHARIENNE REPORTAGE VOIR LES VIDÉOS Reportage, campagne de marque, contenu digitaux, motion design, nous vous accompagnons de A à Z afin de vous livrer des images prêtes à être diffusées. Shooting de marque MAROC Interview Mike Horn PARIS Route du Rhum 2022 SAINT-MALO Des clients heureux. Et nous aussi [&hellip;]" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    
    <!-- Open Graph -->
    <meta property="og:title" content="Accueil | Logma Production">
    <meta property="og:description" content="Société de production audiovisuelle. Réalisation de contenus digitaux, reportages, campagne de marque, motion design et plus encore !">
    <meta property="og:country-name" content="France">
    <meta property="og:image" content="./ressources/img/logo-logma.webp"> 
    <meta property="og:url" content="https://www.logma-production.com/">
    <meta property="og:type" content="website">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.logma-production.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Accueil | Logma Production">
    <meta property="og:description" content="Société de production audiovisuelle. Réalisation de contenus digitaux, reportages, campagne de marque, motion design et plus encore !">
    <meta property="og:image" content="https://logma-production.com/ressources/img/logo-logma-black.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="logma-production.com">
    <meta property="twitter:url" content="https://www.logma-production.com/">
    <meta name="twitter:title" content="Accueil | Logma Production">
    <meta name="twitter:description" content="Société de production audiovisuelle. Réalisation de contenus digitaux, reportages, campagne de marque, motion design et plus encore !">
    <meta name="twitter:image" content="https://logma-production.com/ressources/img/logo-logma-black.webp">


    <!-- Tags -->
    <link rel="canonical" href="https://www.logma-production.com/" />
    <meta name="description" content="Nous sommes une société de production basée à Rennes, réalisation de contenus digitaux, reportages, campagne de marque, motion design. Nous vous accompagnons dans tous vos projets de A à Z pour vous livrer des images prêtes à être diffusées !" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow"/>

    <!-- Apple touch icon -->
    <link rel="apple-touch-icon" href="somedir/apple-touch-icon-iphone-60x60.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://logma-production.com/ressources/img/touch-icons/apple-touch-icon-ipad-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://logma-production.com/ressources/img/touch-icons/apple-touch-icon-iphone-retina-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://logma-production.com/ressources/img/touch-icons/apple-touch-icon-ipad-retina-152x152.png">


</head>

<body class="bg-color-black">
    <main>
        <section>
            <div>
                <video autoplay muted loop class="background-video-homepage top-0 left-0 right-0">
                    <source src="./ressources/video/Bande demo logma.mp4">
                </video>
            </div>

            <?php
            require "./components/header.php"
            ?>

        </section>

        <section class="spacing-section" >
            <div class="container">
                <div class="text-center spacing-section ">
                    <div>
                        <h1 class="color-white" aria-label="Logma c'est des reportages, des campagnes de marque et du motion design" >Logma c'est </h1>
                        <h2 class="typewrite color-white typewrite-require-space" data-period="1500" data-type='[ "Des reportages.", "Des campagnes de marque.", "Du motion design."]'>
                            <span class="wrap"></span>
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="spacing-section">
            <div class="container">
                <h2 class="text-center color-white">Nos derniers projets</h2>
                <div class="spacing-last-projects mb-50">
                    <?php 
                        $projectDisplay->displayContent($projects)
                    ?>
                </div>
            <div class="container ">
                <div class="object-center spacing-section">
                    <a href="https://www.youtube.com/@logma_production" class="first-cta ">
                        VOIR LE CONTENU
                    </a>
                </div>
            </div>
        </section>

        <section class="spacing-section bg-color-white">
            <div class="container">
                <div class="triple-col spacing-last-projects mb-50">
                    <span class="triple-col-1">
                        <div>
                            <img src="./ressources/img/shooting-de-marque.webp" alt="packshot nohé créateur de vêtements" loading="lazy" oncontextmenu="return false;">
                        </div>
                        <h4>Shooting de marque</h4>
                        <h5>MAROC</h5>
                    </span>
                    <span class="triple-col-2">
                        <div>
                            <img src="./ressources/img/interview-mike-horn.webp" alt="interview Mike Horn" loading="lazy" oncontextmenu="return false;">
                        </div>
                        <h4>Interview Mike Horn</h4>
                        <h5>PARIS</h5>
                    </span>
                    <span class="triple-col-3">
                        <div>
                            <img src="./ressources/img/shooting-route-du-rhum.webp" alt="reportage pour la route du rhum 2022" loading="lazy" oncontextmenu="return false;">
                        </div>
                        <h4>Route du Rhum 2022</h4>
                        <h5>SAINT-MALO</h5>
                    </span>
                </div>
            </div>
            <div class="text-center spacing-section">
                <h3>Des clients heureux</h3>
                <h4>Et nous aussi !</h4>
            </div>
            <div class="container">
                <img src="./ressources/img/clients-logma-production.png" alt="Nos partenaires" loading="lazy" oncontextmenu="return false;">
            </div>
            <div class="object-center spacing-section">
                <a href="./contacts" class="second-cta ">
                    UN PROJET ? LET’S GO.
                </a>
            </div>

            <!-- Error Modal -->
            <div id="errorModal" class="error-modal top-0 left-0 h-full w-full bg-faded-black">
                <div class="modal-error-content bg-color-white w-full flex-container vertical-align ">                    
                    <p id="modalText" class="">Text par défaut</p>
                    <span class="close-error color-main">&times;</span>
                </div>
            </div>
        </section>
    </main>

    <?php
        require "./components/footer.php"
    ?>

</body>

</html>

