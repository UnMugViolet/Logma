<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Photo | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="css/main.css">
    
    <!-- JS -->
    <script src="./js/script.js" type="text/javascript" defer></script>
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

</head>

<body class="bg-color-black">
    <section class="mb-100">
            <?php
                include_once "../../components/header.php"
            ?>
    </section>
    <section class="w-full pad-10 ">

    <?php
        include_once '../../classes/dbh.classes.php';

        $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt = mysqli_stmt_init($conn);
        $result = "";

        $columnClasses = ['triple-col-1', 'triple-col-2', 'triple-col-3'];
        $columnIndex = 0;
        $pictureCounter = 0;

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'Erreur SQL';
        } else { 
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            echo '<div class="triple-col spacing-last-projects">';

            while($row = mysqli_fetch_assoc($result)) {
                $currentClass = $columnClasses[$columnIndex % count($columnClasses)];

                echo '
                <span class="' . $currentClass . '">
                    <div>
                        <img class="gallery-image-size" src="./ressources/img/gallery/'. $row["imgFullNameGallery"] .'" alt="'. $row["titleGallery"] .'">
                    </div>
                    <h4 class="color-white">'. $row["titleGallery"] .'</h4>
                    <h5 class="color-white">'. $row["projectGallery"] .'</h5>
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
        </div>
    </section>
    <?php
        include_once "../../components/footer.php"
    ?>
</body>

</html>

