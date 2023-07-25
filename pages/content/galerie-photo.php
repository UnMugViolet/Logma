<?php
$name = "Paul & Ben";
echo "<h1>Bonjour ! ce site a été conçu par {$name}</h1> ";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Photo | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/specific/header.css">
    <link rel="stylesheet" href="css/specific/footer.css">

    <!-- JS -->
    <script src="./js/components/header.js" type="text/javascript"></script>
    <script src="./js/components/footer.js" type="text/javascript"></script>
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="/ressources/favicon.ico">

</head>

<body >
    <section>
        <div>
            <header-component/>
        </div>
    </section>
    
    <footer-component/>
</body>

</html>