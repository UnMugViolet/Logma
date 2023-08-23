<?php

class SignupContr extends Signup {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser(){
        if ($this->emptyInput() == false) {
            header("location: ../access-admin-logma/signup?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../access-admin-logma/signup?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../access-admin-logma/signup?error=email");
            exit();
        }
        if ($this->pwdRequirement() == false) {
            header("location: ../access-admin-logma/signup?error=pwdrequirement");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../access-admin-logma/signup?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../access-admin-logma/signup?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
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
        $pwdMandatoryLength = 20;
        $specialCharCount = 0;
        $uppercaseCharCount = 0;
    
        for ($i = 0; $i < strlen($this->pwd); $i++) {
            $char = $this->pwd[$i];
            
            if (ctype_upper($char)) {
                $uppercaseCharCount++;
            } elseif (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $char)) {
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
}