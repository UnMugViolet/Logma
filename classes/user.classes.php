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

    public function getId(){
        return $this->id;
    }
    public function getUid(){
        return $this->uid;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){
        return $this->role;
    }

    public function getDeleteButton() {
        // Generate and return the delete button HTML for this user
        return '<button class="trigger-click danger-button mt-20 bg-color-red color-white pad-10" data-userid="' . $this->id . '">Supprimer</button>';
    }
}