<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contacts | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->
    <script src="./js/components/header.js" type="text/javascript"></script>
    <script src="./js/components/footer.js" type="text/javascript"></script>
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="/ressources/favicon.ico">

</head>

<body>
    <section>
        <div>
            <header-component/>
        </div>
    </section>

    <section class="spacing-section dual-col bg-color-black">
      <div class="container spacing-section col-1">
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
              $message_error = 'Votre message ne doit pas être vide';
            }
          }
        ?>
        

        <div class="spacing-section">
            <form action="" method="POST">

                <label for="name"></label><br>
                <input class="w-trois-quart" type="text" name="name" placeholder="Nom" >
                <p><?php if(isset($name_error)) echo $name_error; ?></p>

                <label for="subject"></label><br>
                <input class="w-trois-quart" type="text" placeholder="Objet">
                <p><?php if(isset($subject_error)) echo $subject_error; ?></p>

                <label for="email"></label><br>
                <input class="w-trois-quart" type="text" name="email" placeholder="E-mail">
                <p><?php if(isset($email_error)) echo $email_error; ?></p>

                <label for="message"></label><br>
                <textarea class="w-trois-quart" name="message" placeholder="Votre Message"></textarea>
                <p><?php if(isset($message_error)) echo $message_error; ?></p>

                <input type="submit" name="submit" value="Envoyer" class="submit-cta">
                <?php 
                if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
                    $to = 'contact@logma-production.com'; // edit here
                    $body = " Name: $name\n E-mail: $email\n Message:\n $message";
                    if(mail($to, $subject, $body)){
                    echo '<p style="color: green">Message envoyé avec succès</p>';
                    }else{
                    echo '<p>Une erreur s\'est produite, vous pouvez nous contacter à contact@logma-production.com</p>';
                    }
                }
                ?>
          </form>
        </div>
      </div>

      <div class="col-2 container">
        <p>fehbzuihfiafd</p>
      </div>

    </section>
    
    <footer-component />
</body>

</html>