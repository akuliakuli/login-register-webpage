<?php 

class Signup extends Dbh{


    protected function checktheUser($name,$email){
        $sql = 'SELECT name FROM `users` WHERE name = ? OR email = ?';
        $stmt = $this ->connect() -> prepare($sql);
        if(!$stmt -> execute([$name,$email])){
            $stmt = null;
            header("location:../main.php?error=stmtfailed");
            exit();
        }
        $resultcheck;

        if($stmt ->rowCount() > 0){
            $resultcheck = false;
        }else{
            $resultcheck = true;
        }
        return $resultcheck;
    }
    protected function setUser($name,$email,$psw){
        $sql = "INSERT INTO users (name,email,password) VALUES (?,?,?)";
        $stmt = $this -> connect() -> prepare($sql);
        $hashedpsd = password_hash($psw,PASSWORD_DEFAULT);

        if(!$stmt -> execute([$name,$email,$hashedpsd])){
            $stmt = null;
            header("location:../main.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}