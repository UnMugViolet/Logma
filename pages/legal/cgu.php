<?php
    include_once('../../includes/user-role-check.inc.php');
    include_once('../../includes/maintenance.inc.php');

    if ($userAdmin || $userDev || $user || $notUser) {
        $userHasAccess = true;
    } else{
        $sessionManager->forbiddenAccess();
    } 
    
    // Check Maintenance
    $maintenanceManager = new MaintenanceModeManager('../../config/config.php', $authorizedIPs);

    if ($maintenanceManager->isMaintenanceModeActive()) {
        if ($maintenanceManager->isAuthorizedIP()) {
            $maintenanceManager->displayMaintenanceOnBanner();
        } else {
            $sessionManager->maintenanceMode();
        }
    }
    
    $websiteName= "Logma Production";
    $websiteURL= "www.logma-production.com";
    $ownerName = "Baptiste Fablet";
    $devName = "Paul Jaguin";
    $address = "1 rue du General Maurice Guillaudot, 35000 Rennes";
    $siren = "894 994 383 00012";
    $phoneNumber = "06 79 79 69 70";
    $email= "contact@logma-production.com";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGU | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Robot -->
    <meta name="robots" content="noindex, nofollow"/>

</head>

<body class="bg-color-black">
    <section>
        <?php
            include_once "../../components/header.php"
        ?>
    </section>
    <section class="spacing-section color-white mt-50 mb-50">
        <div class="container mb-50 text-center-left">
            <h1 class="mb-20">CGU</h1>
            <p>Les présentes conditions générales régissent l’utilisation de ce site : <?php echo $websiteURL ?></p>
            <p>Ce site appartient et est géré par <?php echo $websiteName ?></p>
            <p>En utilisant ce site, vous indiquez que vous avez lu et compris les conditions d’utilisation et que vous acceptez de les respecter en tout temps.</p>
            <p>Type de site : blog</p>
        </div>
        <div class="container mb-50">
            <h2>Propriété intellectuelle.</h2>
            <p>Tout contenu publié et mis à disposition sur ce site est la propriété de <?php echo $websiteName ?> et de ses créateurs. Cela comprend, mais n’est pas limité aux images, textes, logos, documents, fichiers téléchargeables et tout ce qui contribue à la composition de ce site.</p>
        </div>
        <div class="container mb-50">
            <h2>Utilisation acceptable.</h2>
            <p class="mb-20">En tant qu’utilisateur, vous acceptez d’utiliser notre site légalement et de ne pas utiliser ce site pour des fins illicites, à savoir :</p>
            <li>Harceler ou maltraiter les autres utilisateurs du site</li>
            <li>Violer les droits des autres utilisateurs du site</li>
            <li>Violer les droits de propriété intellectuelle des propriétaires du site ou de tout tiers au site</li>
            <li>Agir de toute façon qui pourrait être considérée comme frauduleuse</li>
            <li>Participer à toute activité illégale sur le site</li>
            <li>Afficher tout matériel qui peut être jugé inapproprié ou offensant</li>
            <p class="mt-20">Si nous estimons que vous utilisez ce site illégalement ou d’une manière qui viole les conditions d’utilisation acceptable ci-dessus, nous nous réservons le droit de limiter, suspendre ou résilier votre accès à ce site. Nous nous réservons également le droit de prendre toutes les mesures juridiques nécessaires pour vous empêcher d’accéder à notre site.</p>

        </div>
        <div class="container mb-50">
            <h2>Limitation de la responsabilité</h2>
            <p><?php echo $websiteName ?> ou l’un de ses employés sera tenu responsable de tout problème découlant de ce site. Néanmoins, <?php echo $websiteName ?> et ses employés ne seront pas tenus responsables de tout problème découlant de toute utilisation irrégulière de ce site.</p>
        </div>
        <div class="container mb-50">
            <h2>Indemnité</h2>
            <p>En tant qu’utilisateur, vous indemnisez par les présentes <?php echo $websiteName ?> de toute responsabilité, de tout coût, de toute cause d’action, de tout dommage ou de toute dépense découlant de votre utilisation de ce site ou de votre violation de l’une des dispositions énoncées dans le présent document.</p>
        </div>
        <div class="container mb-50">
            <h2>Lois applicables</h2>
            <p>Ce document est soumis aux lois applicables en France et vise à se conformer à ses règles et règlements nécessaires. Cela inclut la réglementation à l’échelle de l’UE énoncée dans le RGPD.</p>
        </div>
        <div class="container mb-50">
            <h2>Divisibilité </h2>
            <p>Si, à tout moment, l’une des dispositions énoncées dans le présent document est jugée incompatible ou invalide en vertu des lois applicables, ces dispositions seront considérées comme nulles et seront retirées du présent document. Toutes les autres dispositions ne seront pas touchées par les lois et le reste du document sera toujours considéré comme valide.</p>
        </div>
        <div class="container mb-50">
            <h2>Modifications  </h2>
            <p>Ces conditions générales peuvent être modifiées de temps à autre afin de maintenir le respect de la loi et de refléter tout changement à la façon dont nous gérons notre site et la façon dont nous nous attendons à ce que les utilisateurs se comportent sur notre site. Nous recommandons à nos utilisateurs de vérifier ces conditions générales de temps à autre pour s’assurer qu’ils sont informés de toute mise à jour. Au besoin, nous informerons les utilisateurs par courriel des changements apportés à ces conditions ou nous afficherons un avis sur notre site.</p>
        </div>

        <div class="container mb-50">
            <h2>Contact</h2>
            <p>Par téléphone : <?php echo $phoneNumber ?></p>
            <p>Par email  : <?php echo $email ?></p>
            <p>Par courrier : <?php echo $address ?></p>
        </div>
    </section>
    
    <?php
        include_once "../../components/footer.php"
    ?>
</body>

</html>