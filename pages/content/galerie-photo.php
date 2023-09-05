<?php
    session_start();
    $userAdmin = isset($_SESSION["userrole"]) && $_SESSION["userrole"] === "admin";

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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

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
            header("location: ./galerie-photo?error=stmtfailed");
            exit();
        } else {
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $columnClasses = ['triple-col-1', 'triple-col-2', 'triple-col-3'];
            $columnIndex = 0;
            $pictureCounter = 0;

            echo '<div class="triple-col spacing-last-projects">';

            foreach ($images as $row) {

                // Generate the image source path
                $imageSrc = "./ressources/img/gallery/" . $row["imgFullNameGallery"];
                $imageAlt = $row["titleGallery"];
                $title = $row["titleGallery"];
                $project = $row["projectGallery"];

                // Determine the CSS class
                $currentClass = $columnClasses[$columnIndex % count($columnClasses)];


                // Check if the user is an admin
                if ($userAdmin) {
                    $form = '
                        <form class="absolute right-0 top-0 pad-10" action="./includes/gallery-delete.inc.php" method="post">
                            <input type="hidden" name="filename" value="' . $row["imgFullNameGallery"] . '">
                            <button class ="delete-cta" type="submit" name="deleteImage" value="Delete Image"></button>
                        </form>
                    ';
                } else {
                    $form = '';
                }

                // Output the HTML
                echo <<<HTML
                    <span class="$currentClass">
                        <div class="relative">
                            <img class="gallery-image-size w-full" src="$imageSrc" alt="$imageAlt">
                            $form
                        </div>
                        <h4 class="color-white">$title</h4>
                        <h5 class="color-white">$project</h5>
                    </span>
                HTML;
                
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