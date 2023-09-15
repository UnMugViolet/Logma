<?php
    include_once('../../includes/user-role-check.inc.php');
    include_once('../../classes/gallery.classes.php');
    include_once ('../../view/triple-column.view.php');
    include_once('../../includes/maintenance.inc.php');


    if ($userAdmin || $userDev || $user || $notUser) {
        $userHasAccess = true;
    } else{
        $sessionManager->forbiddenAccess();
    } 

    $galleryItems = new ImageManagement();
    $images = $galleryItems->getImageGallery();

    $galleryDisplay = new GalleryDisplay($galleryItems);

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
    <title>Galerie Photo | Logma</title>

    <!-- Feuille de CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    <script src="./js/error/modal.error.js" type="module" defer></script>
    <script src="./js/modal/delete-image.modal.js" type="text/javascript" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

</head>

<body class="bg-color-black">
    <section>
        <?php
        include_once "../../components/header.php";
        ?>
    </section>
    <section class="w-full pad-10 mt-100 mb-100">
        <?php
            $galleryDisplay->displayContent($images);
        ?>

        <!-- Error Modal -->
        <div id="errorModal" class="error-modal top-0 left-0 h-full w-full bg-faded-black">
                <div class="modal-error-content bg-color-white w-full flex-container vertical-align ">                    
                    <p id="modalText" class="">Text par défaut</p>
                    <span class="close-error color-main">&times;</span>
                </div>
            </div>
    </section>
    <?php
    include_once "../../components/footer.php";
    ?>
</body>

</html>