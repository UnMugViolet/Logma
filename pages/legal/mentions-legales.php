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
    <title>Mentions légales | Logma </title>

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
        <div class="container mb-50">
            <h1>Mentions légales.</h1>
            <p>Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance en l’économie numérique, il est précisé aux utilisateurs du site eikon-studio l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.</p>
        </div>
        <div class="container mb-50">
            <h2>Edition du site</h2>
            <p>Le présent site, accessible à l’URL <?php echo $websiteURL ?> (le « Site »), est édité par :</p>
            <p><?php echo $ownerName ?>, résidant <?php echo $address ?> de nationalité Française (France), né le 30/01/1997 inscrite au R.C.S. de RENNES sous le numéro <?php echo $siren ?> ,</p>
        </div>
        <div class="container mb-50">
            <h2>Hébergement</h2>
            <p>Le Site est hébergé par la société PlanetHoster, situé 4416 Louis-B.-Mayer Laval, Québec Canada H7P 0G1, (contact téléphonique ou email : (+1) 855 774 4678).</p>
        </div>
        <div class="container mb-50">
            <h2>Directeur de publication</h2>
            <p>Le Directeur de la publication du Site est <?php echo $ownerName ?>.</p>
        </div>
        <div class="container mb-50">
            <h2>Nous contacter</h2>
            <p>Par téléphone : <?php echo $phoneNumber ?></p>
            <p>Par email  : <?php echo $email ?></p>
            <p>Par courrier : <?php echo $address ?></p>
        </div>
        <div class="container mb-50">
            <h2>Données personnelles.</h2>
            <p>Le traitement de vos données à caractère personnel est régi par notre Charte du respect de la vie privée, disponible depuis la section « <a href="./rgpd.php" alt="lien vers les RGPD" class="color-white">Charte de Protection des Données Personnelles</a> », conformément au Règlement Général sur la Protection des Données 2016/679 du 27 avril 2016 («RGPD»)</p>
        </div>
    </section>

    <?php
        include_once "../../components/footer.php"
    ?>
</body>

</html>