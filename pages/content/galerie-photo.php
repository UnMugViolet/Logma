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

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section class="mb-100">
        <?php
        include_once "../../components/header.php";
        ?>
    </section>
    <section class="w-full pad-10">
        <?php
        include_once '../../classes/dbh.classes.php';

        // Create an instance of the Dbh class to establish the PDO connection
        $dbhInstance = new Dbh();
        $db = $dbhInstance->connect();

        $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt = $db->prepare($sql);

        if (!$stmt) {
            echo 'Erreur SQL';
        } else {
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $columnClasses = ['triple-col-1', 'triple-col-2', 'triple-col-3'];
            $columnIndex = 0;
            $pictureCounter = 0;

            echo '<div class="triple-col spacing-last-projects">';

            foreach ($images as $row) {
                $currentClass = $columnClasses[$columnIndex % count($columnClasses)];

                // Generate the image source path
                $imageSrc = "./ressources/img/gallery/" . $row["imgFullNameGallery"];

                echo '
                <span class="' . $currentClass . '">
                    <div class="gallery-image-size h-full-screen" style="background-image:url(./ressources/img/gallery/'. $row["imgFullNameGallery"] .');">
                    </div>
                    <h4 class="color-white">' . $row["titleGallery"] . '</h4>
                    <h5 class="color-white">' . $row["projectGallery"] . '</h5>
                </span>';

                $columnIndex++;
                $pictureCounter++;

                if ($pictureCounter === 3) {
                    echo '</div>';
                    $pictureCounter = 0;
                    if ($columnIndex > 0) {
                        echo '<div class="triple-col spacing-last-projects">';
                    }
                }
            }

            // Close the last div if it's not closed already
            if ($pictureCounter > 0) {
                echo '</div>';
            }
        }
        ?>
    </section>
    <?php
    include_once "../../components/footer.php";
    ?>
</body>

</html>