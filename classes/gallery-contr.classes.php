<?php

class UploadContr extends Upload {

    private $imageTitle;
    private $imageCity; 
    private $fileName;
    private $fileError;
    private $fileSize;
    

    public function __construct($imageTitle, $imageCity, $fileName, $fileSize, $fileError)
    {
        $this->imageTitle = $imageTitle;
        $this->imageCity = $imageCity;
        $this->fileName = $fileName;
        $this->fileError = $fileError;
        $this->fileSize = $fileSize;
    }   

    public function uploadImage(){
        if ($this->emptyInput() == false) {
            header("location: ../access-admin-logma/gallery?error=emptyinput");
            exit();
        }

        // if ($this->invalidExtension() == false) {
        //     header("location: ../access-admin-logma/gallery?error=filetype");
        //     exit();
        // }

        // if ($this->invalidFile() == false) {
        //     header("location: ../access-admin-logma/gallery?error=default");
        //     exit();
        // }

        // if ($this->invalidSize() == false) {
        //     header("location: ../access-admin-logma/gallery?error=filesize");
        //     exit();
        // }

        if ($this->nameTakenCheck() == false) {
            header("location: ../access-admin-logma/gallery?error=nameimage");
            exit();
        }


        $this->setImage($this->imageTitle, $this->imageCity);
    }

    private function emptyInput(){
        $result="";

        if(empty($this->imageTitle) || empty($this->imageCity)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidFile(){
        $result="";

        if ($this->fileError === 0) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

    private function invalidSize(){
        $result="";
        define('MB', 1048576);

        if ($this->fileSize < 20*MB) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

    private function invalidExtension(){
        $result="";

        $fileExtArray = explode(".", $this->fileName);

        $fileExt = strtolower(end($fileExtArray));
        $allowed = array("jpg", "jpeg", "png");
        
        if (in_array($fileExt, $allowed)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

    private function nameTakenCheck(){
        $result="";

        if (!$this->checkImage($this->fileName) ) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result; 
    }

}
