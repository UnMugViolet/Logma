<?php error_reporting(0); ?>

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
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section class="bg-image-small bg-image-car">
            <?php
                include_once "../../components/header.php"
            ?>
    </section>

    <section class="spacing-section ">

      <div class="container dual-col">
        <div class="container w-full dual-col-1">
          <?php
            if(isset($_POST['submit'])){
              $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
              $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
              $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
              $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
              if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
                $name_error = 'Votre Nom n\'est pas valide';
              }
              if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
                $subject_error = 'Votre sujet n\'est pas valide';
              }
              if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
                $email_error = 'Votre e-mail n\'est pas valide';
              }
              if(strlen($message) === 0){
                $message_error = 'Votre message est vide';
              }
            }
          ?>
          

          <div class="w-full">
            <h1 class="color-white">On reste en contact ?</h1>

            <form action="" method="POST">
                  <label for="name"></label><br>
                  <input class="w-full input input-small bg-color-black color-white" type="text" name="name" placeholder="Nom" >
                  <p class="color-white"><?php if(isset($name_error)) echo $name_error; ?></p>

                  <label for="subject"></label><br>
                  <input class="w-full input input-small bg-color-black color-white"  type="text" placeholder="Objet">
                  <p class="color-white"><?php if(isset($subject_error)) echo $subject_error; ?></p>

                  <label for="email"></label><br>
                  <input class="w-full input input-small bg-color-black color-white"  type="text" name="email" placeholder="E-mail">
                  <p class="color-white"><?php if(isset($email_error)) echo $email_error; ?></p>

                  <label for="message"></label><br>
                  <textarea class="w-full input input-large bg-color-black color-white"  name="message" placeholder="Votre Message"></textarea>
                  <p class="color-white"><?php if(isset($message_error)) echo $message_error; ?></p>

                  <div class="responsive-center">
                    <input type="submit" name="submit" value="Envoyer" class="submit-cta">
                  </div>

                  <?php 
                  if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
                      $to = 'contact@logma-production.com'; // Changer le mail ici
                      $body = " Name: $name\n E-mail: $email\n Message:\n $message";
                      if(mail($to, $subject, $body)){
                      echo '<p style="color: green">Message envoyé avec succès !</p>';
                      }else{
                      echo '<p class="color-white">Une erreur s\'est produite, vous pouvez nous contacter à contact@logma-production.com</p>';
                      }
                  }
                  ?>
            </form>
          </div>
        </div>

        <div class="container dual-col-2 vertical-align spacing-section w-full">
          <div>
            <div>
              <div class="object-center margin-whatsapp">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                  <path fill="#ffffff" d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z"/>
                </svg>
              </div>

              <div class="object-center margin-number">
                <a class="object-center" href="tel:+0679796970">06 79 79 69 70</a>
              </div>

            </div>
            <div>
              <img src="./ressources/img/baptiste-fablet.jpg" alt="baptiste fablet au travail">
            </div>
          </div>

        </div>

      </div>
    </section>

    <?php
      include_once "../../components/footer.php"
    ?>
</body>

</html>