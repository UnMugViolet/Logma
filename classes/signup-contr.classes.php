<?php

class SignupContr extends Signup {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $userRole;

    public function __construct($uid, $pwd, $pwdRepeat, $email, $userRole)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
        $this->userRole = $userRole;
    }

    public function signupUser(){
        if ($this->emptyInput() == false) {
            $this->redirectToGallery("emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            $this->redirectToGallery("username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            $this->redirectToGallery("email");
            exit();
        }
        if ($this->pwdRequirement() == false) {
            $this->redirectToGallery("pwdrequirement");
            exit();
        }
        if ($this->pwdMatch() == false) {
            $this->redirectToGallery("passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            $this->redirectToGallery("useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email, $this->userRole);
    }

    
    private function emptyInput(){
        $result="";
        
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    
    private function invalidUid(){
        $result="";
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }
    
    private function invalidEmail(){
        $result="";
        
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }
    
    private function pwdRequirement(){
        $pwdMandatoryLength = 16;
        $specialCharCount = 0;
        $uppercaseCharCount = 0;
        
        for ($i = 0; $i < strlen($this->pwd); $i++) {
            $char = $this->pwd[$i];
            
            if (ctype_upper($char)) {
                $uppercaseCharCount++;
            } elseif (preg_match('/[!?@#$%^&*()\-_=+{};:,<.>]/', $char)) {
                $specialCharCount++;
            }
        }
        
        return strlen($this->pwd) >= $pwdMandatoryLength && $specialCharCount >= 2 && $uppercaseCharCount >= 2;
    }
    
    private function pwdMatch(){
        $result="";
        
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }
    
    private function uidTakenCheck(){
        $result="";
        
        if (!$this->checkUser($this->uid, $this->email) ) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }
    
    private function redirectToGallery($errorType)
    {
        header("location: ../access-admin-logma/signup?error=$errorType");
        exit();
    }
}