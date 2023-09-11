<?php
    include_once('../../includes/user-role-check.inc.php');
    include_once('../../classes/gallery.classes.php');
    include_once ('../../view/triple-column.view.php');

    if ($userAdmin || $userDev || $user || $notUser) {
        $userHasAccess = true;
    } else{
        $sessionManager->forbiddenAccess();
    } 

    $galleryItems = new ImageManagement();
    $images = $galleryItems->getImageGallery();

    $galleryDisplay = new GalleryDisplay($galleryItems);
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
    <script src="./js/modal/delete-account.modal.js" type="text/javascript" defer></script>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section class="spacing-section">
        <?php
        include_once "../../components/header.php";
        ?>
    </section>
    <section class="w-full pad-10">
        <?php
            $galleryDisplay->displayContent($images);
        ?>
    </section>
    <?php
    include_once "../../components/footer.php";
    ?>
</body>

</html>