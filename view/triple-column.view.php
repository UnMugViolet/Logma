<?php

abstract class DisplayTripleCol {

    protected $columnClasses = ['triple-col-1', 'triple-col-2', 'triple-col-3'];
    protected $columnIndex = 0;
    protected $itemCounter = 0;

    public function displayContent($contentItems) {
        echo '<div class="triple-col">';
    
        foreach ($contentItems as $contentItem) {
            // Determine the CSS class
            $currentClass = $this->columnClasses[$this->columnIndex % count($this->columnClasses)];
    
            // Generate the content HTML
            $contentHTML = $this->generateContentHTML($contentItem);
    
            // Output the content HTML
            echo <<<HTML
                <span class="$currentClass spacing-gallery">
                    <div class="relative">
                        $contentHTML
                    </div>
                </span>
            HTML;
    
            $this->columnIndex++;
            $this->itemCounter++;
    
            if ($this->itemCounter === 3) {
                echo '</div>';
                $this->itemCounter = 0;
                if ($this->columnIndex > 0) {
                    echo '<div class="triple-col">';
                }
            }
        }

        if ($this->itemCounter === 1) {
            echo '<span class="triple-col-2"></span><span class="triple-col-3"></span>';
        } elseif ($this->itemCounter === 2) {
            echo '<span class="triple-col-3"></span>';
        }
    
        // Close any open div tags
        if ($this->itemCounter > 0) {
            echo '</div>';
        }
    }

    abstract protected function generateContentHTML($contentItem);
}
    


class GalleryDisplay extends DisplayTripleCol {

    protected function generateContentHTML($galleryItems) {
      
        include_once('../../includes/user-role-check.inc.php');

        // Extract data from the gallery item
        $imageSrc = "./ressources/img/gallery/" . $galleryItems["imgFullNameGallery"];
        $imageAlt = $galleryItems["titleGallery"];
        $title = $galleryItems["titleGallery"];
        $project = $galleryItems["projectGallery"];

        // Check if the user is an admin
        $form = '';
        if ($_SESSION['userAdmin'] || $_SESSION['userDev']) {
            $form = '

            <div class="overlay-delete fixed top-0 left-0 w-full h-full bg-cloudy-black" id="overlay-' . $galleryItems["imgFullNameGallery"] . '">
                <div class="modal-delete-container fixed bg-color-white pad-20">
                    <div>
                        <h2>Confirmation</h2>
                        <p class="mb-10">Êtes-vous sûr de vouloir supprimer cette photo ?</p>
                        <h4 class="text-center">' . $title . ' - '. $project .'</h4>
                        <form class="delete-form object-center" action="./includes/gallery-delete.inc.php" method="post" name="deleteImage"> 
                            <input type="hidden" name="filename" value="' . $galleryItems["imgFullNameGallery"] . '">
                            <button class="hidden-click danger-button mt-30 bg-color-red color-white pad-10" type="submit">Supprimer l\'image</button>
                        </form>
                        <span class="close-delete-account absolute pad-20 top-0 right-0" id="close-delete' . $galleryItems["imgFullNameGallery"] . '">&times;</span>
                    </div>
                </div>
            </div>

            <form class="absolute right-0 top-0 pad-10" method="post">
                <input type="hidden" name="filename" value="' . $galleryItems["imgFullNameGallery"] . '">
                <button class ="delete-cta" data-image="'. $galleryItems["imgFullNameGallery"].'"></button>
            </form>
            ';
        } else {
            $form = '';
        }

        // Generate and return the HTML for the gallery item
        return <<<HTML
            <div class="relative mt-20">
                <img class="gallery-image-size w-full" src="$imageSrc" alt="$imageAlt" loading="lazy">
                $form
            </div>
            <h4 class="color-white mt-10">$title</h4>
            <h5 class="color-white">$project</h5>
        HTML;
    }
}

class ProjectDisplay extends DisplayTripleCol {

    protected function generateContentHTML($projectItems) {
      
        include_once('./includes/user-role-check.inc.php');

        // Extract data from the gallery item
        $thumbnailName = $projectItems["project_thumbnail_name"];
        $projectSrc = "./ressources/img/projects/" . $thumbnailName;
        $projectAlt = $projectItems["project_title"];
        $projectTitle = $projectItems["project_title"];
        $projectSubtitle = $projectItems["project_subtitle"];
        $projectUrl = $projectItems["project_url"];


        // Check if the user is an admin
        $form = '';
        if ($_SESSION['userAdmin'] || $_SESSION['userDev']) {
            $form = '

            <div class="overlay-delete fixed top-0 left-0 w-full h-full bg-cloudy-black" id="overlay-' . $thumbnailName . '">
                <div class="modal-delete-container fixed bg-color-white pad-20">
                    <div>
                        <h2>Confirmation</h2>
                        <p class="mb-10">Êtes-vous sûr de vouloir supprimer cette photo ?</p>
                        <h4 class="text-center">' . $projectTitle . ' - '. $thumbnailName .'</h4>
                        <form class="delete-form object-center" action="./includes/gallery-delete.inc.php" method="post" name="deleteImage"> 
                            <input type="hidden" name="filename" value="' . $thumbnailName . '">
                            <button class="hidden-click danger-button mt-30 bg-color-red color-white pad-10" type="submit">Supprimer l\'image</button>
                        </form>
                        <span class="close-delete-account absolute pad-20 top-0 right-0" id="close-delete' . $thumbnailName . '">&times;</span>
                    </div>
                </div>
            </div>

            <form class="absolute right-0 top-0 pad-10" method="post">
                <input type="hidden" name="filename" value="' . $thumbnailName . '">
                <button class ="delete-cta" data-image="'. $thumbnailName .'"></button>
            </form>
            ';
        } else {
            $form = '';
        }

        // Generate and return the HTML for the gallery item
        return <<<HTML

            <div class="image-project-container relative">
                <a href="$projectUrl">
                    <img src="$projectSrc" alt="$projectAlt" loading="lazy" oncontextmenu="return false;">
                    <div class="overlay-project absolute top-0 left-0 w-full h-full vertical-align object-center">
                        <p class="text-center absolute">Voir la vidéo</p>
                    </div>
                </a>
            </div>
            <h4 class="color-white">$projectTitle</h4>
            <h5 class="color-white">$projectSubtitle</h5>
        HTML;
    }
}


class UserDisplay extends DisplayTripleCol {
    protected function generateContentHTML($userItem) {
        $svgIcon = $userItem->getSVGIcon();
        $deleteButton = $userItem->getDeleteButton();

        $form = '
            <div class="overlay-delete fixed top-0 left-0 w-full h-full bg-cloudy-black" id="overlay-' . $userItem->getId() . '">
                <div class="modal-delete-container fixed bg-color-white pad-20">
                    <div>
                        <h2>Confirmation</h2>
                        <p class="mb-10">Êtes-vous sûr de vouloir supprimer ce compte utilisateur ?</p>
                        <h4 class="text-center">' . $userItem->getUid() . '</h4>
                        <form class="delete-form object-center" action="../includes/delete-account.inc.php" method="post">
                            <input type="hidden" name="user_id" value="' . $userItem->getId() . '">
                            <button class="hidden-click danger-button mt-30 bg-color-red color-white pad-10" type="submit">Supprimer le compte</button>
                        </form>
                        <span class="close-delete-account absolute pad-20 top-0 right-0" id="close-delete' . $userItem->getId() . '">&times;</span>
                    </div>
                </div>
            </div>
            ';

        return <<<HTML
            <div class="relative card-account pad-20">
                <div class="mb-20">$svgIcon</div>
                <h4 class="color-white text-center mb-10">{$userItem->getUid()}</h4>
                <p class="color-white">{$userItem->getEmail()}</p>
                <h5 class="color-white">{$userItem->getRole()}</h5>
                <div class="object-center">
                    $deleteButton
                </div>
            </div>
            $form
        HTML;
    }
}





