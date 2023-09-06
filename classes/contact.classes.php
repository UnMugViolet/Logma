<?php

class Contact {

    private $name;
    private $subject;
    private $email;
    private $message;

    public function __construct($name, $subject, $email, $message)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->email = $email;
        $this->message = $message;
    }
    protected function sendContactInfo(){

        if($this->emptyInput() == false){
            $this->redirectContactForm("emptyinput");
            exit();
        }
        if ($this->invalidName() == false) {
            $this->redirectContactForm("invalidinput");
            exit();
        }
        if ($this->invalidSubject() == false) {
            $this->redirectContactForm("invalidinput");
            exit();
        }
        if ($this->invalidEmail() == false) {
            $this->redirectContactForm("email");
            exit();
        }
        if ($this->invalidMessage() == false) {
            $this->redirectContactForm("invalidinput");
            exit();
        }
    }

    private function emptyInput(){
        $result="";
        
        if(empty($this->name) || empty($this->subject) || empty($this->email) || empty($this->message)){
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

    private function invalidName(){
        $result="";
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->name)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

    private function invalidSubject(){
        $result="";
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->name)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

    private function invalidMessage(){
        $result="";
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->message)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

    private function redirectContactForm($errorType)
    {
        header("location: ../contacts?error=$errorType");
        exit();
    }
}