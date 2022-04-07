<?php 

class Contr extends Signup {
    private $name;
    private $psw;
    private $pswrep; 
    private $email;
    public function __construct($name,$psw,$pswrep,$email){
        $this -> name = $name;
        $this -> psw = $psw;
        $this -> pswrep = $pswrep;
        $this -> email = $email;
    }
    public function signUser(){
        if($this -> emptyInput() == false){
            header("location:../main.php?error=inputempty");
            exit();
        }
        if($this -> checkPsw() == false){
            header("location:../main.php?error=passwordisempty");
            exit();
        }
        if($this -> rightName() == false){
            header("location:../main.php?error=wronddatatype");
            exit();
        }
        if($this -> validateEmail() == false){
            header("location:../main.php?error=wrongemailtype");
            exit();
        }
        if($this -> nameIsTaken() == false){
            header("location:../main.php?error=thisuseralreadyexist");
            exit();
        }
        $this -> setUser($this -> name,$this ->email,$this -> psw);
    }
    private function emptyInput(){
        $result;
        if(empty($this->name) || empty($this->psw) || empty($this->pswrep) || empty($this->email)){
            $result = false;
            
        }else{
            $result = true;
            
        }
        return $result;
    }
    private function checkPsw(){
        $result;
        if($this->psw !== $this ->pswrep){
            $result = false;
            
        }else{
            $result = true;
            
        }
        return $result;
    }
    private function rightName(){
        $result;
        if(preg_match_all("/[a-zA-z0-9]*$/",$this->name)){
            $result = true;
        
        }else{
            $result = false;

        }
        return $result;
    }
    public function validateEmail(){
        $result;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    public function nameIsTaken(){
        $result;
        if(!$this ->checktheUser($this->name,$this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}