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
  <title>Contact | Logma </title>

  <!--Feuille de CSS-->
  <link rel="stylesheet" href="css/main.css">

  <!-- JS -->
  <script src="./js/script.js" type="text/javascript" defer></script>
  <script src="./js/error/modal.error.js" type="module" defer></script>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <!-- Open Graph -->
  <meta property="og:title" content="Contact | Logma Production">
  <meta property="og:description" content="Contactez-nous ! Discutons de votre projet, de vos idées et de votre passion. Experts en reportages, campagnes de marque et motion design. Construisons un projet ensemble">
  <meta property="og:country-name" content="France">
  <meta property="og:image" content="./ressources/img/logo-logma.webp"> 
  <meta property="og:url" content="https://www.logma-production.com/contacts">
  <meta property="og:type" content="website">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://www.logma-production.com/contacts">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Contact | Logma Production">
  <meta property="og:description" content="Contactez-nous ! Discutons de votre projet, de vos idées et de votre passion. Experts en reportages, campagnes de marque et motion design. Construisons un projet ensemble">
  <meta property="og:image" content="https://logma-production.com/ressources/img/logo-logma-black.webp">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="logma-production.com">
  <meta property="twitter:url" content="https://www.logma-production.com/contacts">
  <meta name="twitter:title" content="Contact | Logma Production">
  <meta name="twitter:description" content="Contactez-nous ! Discutons de votre projet, de vos idées et de votre passion. Experts en reportages, campagnes de marque et motion design. Construisons un projet ensemble">
  <meta name="twitter:image" content="https://logma-production.com/ressources/img/logo-logma-black.webp">

  <!-- Tags -->
  <link rel="canonical" href="https://www.logma-production.com/contacts" />
  <meta name="description" content="Contactez-nous ! Discutons de votre projet, de vos idées et de votre passion. Experts en reportages, campagnes de marque et motion design. Construisons un projet ensemble" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="index, follow"/>


</head>

<body class="bg-color-black">
  <section class="bg-image-contact bg-image-baptise">
    <?php
    include_once "../../components/header.php"
    ?>
  </section>

  <section class="container mt-100">
    <div class="mb-50">
      <h1 class="color-white text-left-center title-margin">On reste en contact ?</h1>
    <div>

    <div class="dual-col mt-100">
      <div class="dual-col-1 spacing-contact">
        <div>
          <h2 class="color-white styled-h2">Laissez nous un petit message</h2>
          <h5 class="color-white">Votre voix compte ! </h5>
          <p class="color-white">Nous sommes ravis de vous entendre ! N'hésitez pas à nous laisser un message pour toute question, suggestion ou demande d'information.</p>
        </div>
      </div>

      <div class="dual-col-2 vertical-align">
          <form action="./includes/contact.inc.php" method="post">
            <input name="name" class="w-full input input-small bg-color-black color-white mb-20" type="text" placeholder="Nom">

            <input name="subject" class="w-full input input-small bg-color-black color-white mb-20" type="text" placeholder="Objet">

            <input name="email" class="w-full input input-small bg-color-black color-white mb-20" type="text" placeholder="E-mail">

            <textarea name="message" class="w-full input input-large bg-color-black color-white mb-20"  placeholder="Votre Message"></textarea>

            <div class="responsive-center">
              <input type="submit" name="submit" value="Envoyer" class="submit-cta">
            </div>
          </form>
      </div>
    </div>

      <!-- Error Modal -->
      <div id="errorModal" class="error-modal top-0 left-0 h-full w-full bg-faded-black">
          <div class="modal-error-content bg-color-white w-full flex-container vertical-align ">                    
              <p id="modalText" class="">Text par défaut</p>  
              <span class="close-error color-main">&times;</span>
          </div>
      </div>
    </div>
  </section>

  <?php
  include_once "../../components/footer.php"
  ?>
</body>

</html>