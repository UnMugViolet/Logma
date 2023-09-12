<?php
  include_once('../../includes/user-role-check.inc.php');
  include_once('../../includes/maintenance.inc.php');

  if ($userAdmin || $userDev || $user || $notUser) {
    $userHasAccess = true;
  } else {
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