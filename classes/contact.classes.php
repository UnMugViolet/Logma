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
    public function sendContactInfo(){

        if($this->emptyInput() == false){
            $this->redirectContactForm("emptyinput");
            exit();
        }
        if ($this->invalidName() == false) {
            $this->redirectContactForm("invalidinput1");
            exit();
        }
        if ($this->invalidSubject() == false) {
            $this->redirectContactForm("invalidinput2");
            exit();
        }
        if ($this->invalidEmail() == false) {
            $this->redirectContactForm("email");
            exit();
        }


        $to = 'contact@logma-production.com';
        $body = " Name: $this->name\n E-mail: $this->email\n Message:\n $this->message";
        
        if (mail($to, $this->subject, $body)) {
            $this->redirectContactForm("none");
            exit();
        } 
        else {
            $this->redirectContactForm("contactfailed");
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

    
    private function invalidName(){
        $result="";
        
        if (!preg_match("/^[0-9A-Za-z .'-]+$/", $this->name)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }
    
    private function invalidSubject(){
        $result="";
        
        if (!preg_match("/^[0-9A-Za-z .'-]+$/", $this->name)) {
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
    

    private function redirectContactForm($errorType)
    {
        header("location: ../contacts?error=$errorType");
        exit();
    }
}