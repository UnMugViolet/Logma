<?php
    include_once('../../includes/user-role-check.inc.php');
    
    if ($userAdmin) {
        $userHasAccess = true;
    } elseif($userDev) {
        $sessionManager->notAllowed();
    } else{
        $sessionManager->forbiddenAccess();
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un compte | Logma </title>

    <!--Feuille de CSS-->
    <link rel="stylesheet" href="../css/main.css">

    <!-- JS -->
    <script src="../js/modal/delete-account.modal.js" type="text/javascript" defer></script>
    <script src="../js/error/modal.error.js" type="module" defer></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logma/favicon.ico">

</head>

<body class="bg-color-black">
    <section class="h-full-screen">
        <div class="container h-full vertical-align object-center">
            <div>
                <div class="block container icon-error mb-50">
                    <img src="/logma/ressources/img/svg/DeleteAccountIcon.svg" alt="Erreur 404">
                </div>
                <div>
                    <h1 class="color-white">Supprimer un compte.</h1>
                </div>
                <div>
                    <?php
                        include_once '../../classes/dbh.classes.php';

                        // Create an instance of the Dbh class to establish the PDO connection
                        $dbhInstance = new Dbh();
                        $db = $dbhInstance->connect();

                        $sql = "SELECT * FROM users ORDER BY users_id";
                        $stmt = $db->prepare($sql);

                        if (!$stmt) {
                            header("location: ./galerie-photo?error=stmtfailed");
                            exit();
                        } else {
                            $stmt->execute();
                            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            $columnClasses = ['triple-col-1', 'triple-col-2', 'triple-col-3'];
                            $columnIndex = 0;
                            $pictureCounter = 0;

                            echo '<div class="triple-col spacing-last-projects vertical-align">';

                        foreach ($users as $row) {

                            // Determine the CSS class
                            $currentClass = $columnClasses[$columnIndex % count($columnClasses)];

                            $svgIcon = '';
                            if ($row['users_role'] === 'admin') {
                                $svgIcon = '<img src="../ressources/img/svg/AdminIcon.svg" class="size-icon" alt="Admin Icon">';
                            } elseif ($row['users_role'] === 'dev') {
                                $svgIcon = '<img src="../ressources/img/svg/CodeIcon.svg" class="size-icon" alt="Dev Icon">';
                            } else {
                                $svgIcon = '<img src="../ressources/img/svg/UserIcon.svg" class="size-icon" alt="User Icon">';
                            }


                            $deleteButton = '<button class="trigger-click" data-userid="' . $row['users_id'] . '">Supprimer</button>';
                            
                            $form = '
                            <div class="overlay-delete fixed top-0 left-0 w-full h-full bg-cloudy-black " id="overlay-' . $row['users_id'] . '">
                                <div class="modal-delete-container fixed bg-color-white pad-20">
                                    <div>
                                        <h2>Confirmation</h2>
                                        <p>Are you sure you want to delete this user account?</p>
                                        <form class="delete-form object-center" action="./includes/gallery-delete.inc.php" method="post">
                                            <input type="hidden" name="user_id" value="' . $row['users_id'] . '">
                                            <button class="hidden-click btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        <span class="close-delete-account absolute pad-20 top-0 right-0" id="close-delete' . $row['users_id'] . '">&times;</span>
                                    </div>
                                </div>
                            </div>

                        ';

                            // Output the HTML
                            echo <<<HTML
                                <span class="$currentClass mb-50">
                                    <div class="relative card-account pad-20">
                                        <div class="mb-20">$svgIcon</div>
                                        <h4 class="color-white text-center mb-10">{$row['users_uid']}</h4>
                                        <p class="color-white">{$row['users_email']}</p>
                                        <h5 class="color-white">{$row['users_role']}</h5>
                                        $deleteButton                                   
                                        $form
                                    </div>
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

                        // close-error the last div if it's not closed already
                        if ($pictureCounter > 0) {
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <div class="flex mt-10">
                    <a href="./dashboard" class="container-link-cta color-white">
                    <p>Retour au Dashboard </p>
                    <p class="icon-link-cta"> →</p>
                    </a>
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
</body>

</html>