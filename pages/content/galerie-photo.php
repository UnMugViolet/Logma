<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Photo | Logma </title>

    <!--Feuille de CSS-->

    <link rel="stylesheet" href="css/main.css">
    

    <!-- JS -->
    <script src="./js/components/header.js" type="text/javascript"></script>
    <script src="./js/components/footer.js" type="text/javascript"></script>
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body >
    <section>
        <div>
            <header-component/>
        </div>
    </section>
    <?php
        $name = "Paul & Ben";
        echo "<h1>Bonjour ! ce site a été conçu par {$name}</h1> ";
    ?>

    <footer-component/>
</body>

</html>

