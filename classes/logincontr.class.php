<?php


class Logincontr extends Login{

    private $name;
    private $psw;

    public function __construct($name, $psw){
        $this ->name = $name;
        $this ->psw = $psw;
    }
    public function LoginUser(){
        if($this -> emptyInput() == false){
            header("location:../main.php?error=inputempty");
            exit();
        }
        $this -> getUser($this->name,$this->psw);
    }
    private function emptyInput(){
        $result;
        if(empty($this->name) || empty($this->psw)){
            $result = false;
            
        }else{
            $result = true;
            
        }
        return $result;
    }
}