<?php
    include_once('./includes/user-role-check.inc.php');

    if ($userAdmin || $userDev || $user || $notUser) {
        $userHasAccess = true;
    } else{
        $sessionManager->forbiddenAccess();
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
    <script src="./js/script.js" type="text/javascript"></script>
    <script src="./js/components/typewirter.js" type="text/javascript" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link rel="canonical" href="https://www.logma-production.com/" />
    <meta property="og:description"
        content="Derniers projets NOHÉ CAMPAGNE PLATYPUS CRAFT DIGITAL TRANSAHARIENNE REPORTAGE VOIR LES VIDÉOS Reportage, campagne de marque, contenu digitaux, motion design, nous vous accompagnons de A à Z afin de vous livrer des images prêtes à être diffusées. Shooting de marque MAROC Interview Mike Horn PARIS Route du Rhum 2022 SAINT-MALO Des clients heureux. Et nous aussi [&hellip;]" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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
                        <h2 class="typewrite color-white" data-period="1500" data-type='[ "Des reportages.", "Des campagnes de marque.", "Du motion design."]'>
                            <span class="wrap"></span>
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="spacing-section">
            <div class="container">
                <h2 class="text-center color-white">Nos derniers projets</h2>
                <div class="triple-col spacing-last-projects ">
                    <span class="triple-col-1">
                        <a href="https://youtu.be/L3AFBkg_BG8" class="relative video-hover">
                            <div class="overlay-project w-full h-full absolute">
                                <p class="text-center absolute">Voir la vidéo</p>
                            </div>
                            <img src="./ressources/img/projet-blacksheep.webp" alt="projet blacksheep concepeteur de van de voyage" loading="lazy">
                        </a>
                        <h4 class="color-white">BLACK SHEEP</h4>
                        <h5 class="color-white">PUBLICITÉ</h5>
                    </span>
                    <span class="triple-col-2">
                        <a href="https://youtu.be/dqAV68Km7hs" class="relative video-hover">
                            <div class="overlay-project w-full h-full absolute">
                                <p class="text-center absolute">Voir la vidéo</p>
                            </div>
                            <img src="./ressources/img/sophie-faguet.webp" alt="bateau de sophie faguet route du rhum" loading="lazy">
                        </a>
                        <h4 class="color-white">SOPHIE FAGUET</h4>
                        <h5 class="color-white">PORTRAIT</h5>
                    </span>
                    <span class="triple-col-3">
                        <a href="https://youtu.be/pLDtHUxPeH4" class="relative video-hover">
                            <div class="overlay-project w-full h-full absolute">
                                <p class="text-center absolute">Voir la vidéo</p>
                            </div>
                            <img src="./ressources/img/colliaux-opticien.webp" alt="shooting de marque colliaux opticiens" loading="lazy">
                        </a>
                        <h4 class="color-white">COLLIAUX OPTICIENS</h4>
                        <h5 class="color-white">CAMPAGNE</h5>
                    </span>
                </div>
            </div>

            <div class="container">
                <div class="triple-col spacing-last-projects ">
                    <span class="triple-col-1">
                        <a href="https://youtu.be/jGQK5btw2xc" class="relative video-hover">
                            <div class="overlay-project w-full h-full absolute">
                                <p class="text-center absolute">Voir la vidéo</p>
                            </div>
                            <img src="./ressources/img/projet-photographe-nohe.webp" alt="shooting photo nohé créateur de vêtements" loading="lazy">
                        </a>
                        <h4 class="color-white">NOHÉ</h4>
                        <h5 class="color-white">CAMPAGNE</h5>
                    </span>
                    <span class="triple-col-2">
                        <a href="https://youtu.be/rNqv_Gi_kIg" class="relative video-hover">
                            <div class="overlay-project w-full h-full absolute">
                                <p class="text-center absolute">Voir la vidéo</p>
                            </div>
                            <img src="./ressources/img/projet-photographe-PLATYPUS-CRAFT.webp" alt="platypus craft tournage en mer" loading="lazy">
                        </a>
                        <h4 class="color-white">PLATYPUS CRAFT</h4>
                        <h5 class="color-white">DIGITAL</h5>
                    </span>
                    <span class="triple-col-3">
                        <a href="https://youtu.be/1TNve6kRkKg" class="relative video-hover">
                            <div class="overlay-project w-full h-full absolute">
                                <p class="text-center absolute">Voir la vidéo</p>
                            </div>
                            <img src="./ressources/img/projet-photographe-transaharienne-maroc.webp" alt="reportage pour la transaharienne" loading="lazy">
                        </a>
                        <h4 class="color-white">TRANSAHARIENNE</h4>
                        <h5 class="color-white">REPORTAGE</h5>
                    </span>
                </div>
            </div>
            <div class="container ">
                <div class="button-center-disposition spacing-section">
                    <a href="https://www.youtube.com/@logma_production" class="first-cta ">
                        VOIR LE CONTENU
                    </a>
                </div>
            </div>
        </section>
        <section class="spacing-section bg-color-white">
            <div class="container">
                <div class="triple-col spacing-last-projects">
                    <span class="triple-col-1">
                        <div>
                            <img src="./ressources/img/shooting-de-marque.webp" alt="packshot nohé créateur de vêtements" loading="lazy">
                        </div>
                        <h4>Shooting de marque</h4>
                        <h5>MAROC</h5>
                    </span>
                    <span class="triple-col-2">
                        <div>
                            <img src="./ressources/img/interview-mike-horn.webp" alt="interview Mike Horn" loading="lazy">
                        </div>
                        <h4>Interview Mike Horn</h4>
                        <h5>PARIS</h5>
                    </span>
                    <span class="triple-col-3">
                        <div>
                            <img src="./ressources/img/shooting-route-du-rhum.webp" alt="reportage pour la route du rhum 2022" loading="lazy">
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
                <img src="./ressources/img/clients-logma-production.png" alt="Nos partenaires" loading="lazy">
            </div>
            <div class="button-center-disposition spacing-section">
                <a href="./contacts" class="second-cta ">
                    UN PROJET ? LET’S GO.
                </a>
            </div>
        </section>
    </main>

    <?php
        require "./components/footer.php"
    ?>

</body>

</html>

