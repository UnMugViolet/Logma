<?php 

class User {
    private $id;
    private $uid;
    private $email;
    private $role;

    public function __construct($id, $uid, $email, $role) {
        $this->id = $id;
        $this->uid = $uid;
        $this->email = $email;
        $this->role = $role;
    }

    public function generateUserHTML() {
        // Generate the HTML for a user card
        $svgIcon = $this->getSVGIcon($this->role);
        $deleteButton = $this->getDeleteButton($this->id);

        $form = '
            <div class="overlay-delete fixed top-0 left-0 w-full h-full bg-cloudy-black" id="overlay-' . $this->id . '">
                <div class="modal-delete-container fixed bg-color-white pad-20">
                    <div>
                        <h2>Confirmation</h2>
                        <p class="mb-10">Êtes-vous sûr de vouloir supprimer ce compte utilisateur ?</p>
                        <h4 class="text-center">' . $this->uid . '</h4>
                        <form class="delete-form object-center" action="./includes/gallery-delete.inc.php" method="post">
                            <input type="hidden" name="user_id" value="' . $this->id . '">
                            <button class="hidden-click danger-button mt-30 bg-color-red color-white pad-10" type="submit">Supprimer le compte</button>
                        </form>
                        <span class="close-delete-account absolute pad-20 top-0 right-0" id="close-delete' . $this->id . '">&times;</span>
                    </div>
                </div>
            </div>
            ';

        return <<<HTML
            <div class="mb-20">$svgIcon</div>
            <h4 class="color-white text-center mb-10">{$this->uid}</h4>
            <p class="color-white">{$this->email}</p>
            <h5 class="color-white">{$this->role}</h5>
            <div class="object-center">
                $deleteButton
            </div>
            $form
        HTML;
    }

    public function displayLayoutUsers($users) {
        $columnClasses = ['triple-col-1', 'triple-col-2', 'triple-col-3'];
        $columnIndex = 0;
        $pictureCounter = 0;
    
        echo '<div class="triple-col spacing-last-projects vertical-align">';
    
        foreach ($users as $user) {
            // Determine the CSS class
            $currentClass = $columnClasses[$columnIndex % count($columnClasses)];
    
            // Generate the user card HTML
            $userHTML = $user->generateUserHTML();
    
            // Output the user HTML
            echo <<<HTML
                <span class="$currentClass mb-50">
                    <div class="relative card-account pad-20">
                        $userHTML
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
    
        // Close any open div tags
        if ($pictureCounter > 0) {
            echo '</div>';
        }
    }
    

    public function getSVGIcon() {
        // Determine and return the SVG icon based on the user's role
        if ($this->role === 'admin') {
            return '<img src="../ressources/img/svg/AdminIcon.svg" class="size-icon" alt="Admin Icon">';
        } elseif ($this->role === 'dev') {
            return '<img src="../ressources/img/svg/CodeIcon.svg" class="size-icon" alt="Dev Icon">';
        } else {
            return '<img src="../ressources/img/svg/UserIcon.svg" class="size-icon" alt="User Icon">';
        }
    }

    public function getDeleteButton() {
        // Generate and return the delete button HTML for this user
        return '<button class="trigger-click danger-button mt-20 bg-color-red color-white pad-10" data-userid="' . $this->id . '">Supprimer</button>';
    }
}