<?php


class Login extends Dbh{

    protected function getUser($name,$psw){
        $sql = "SELECT password FROM users WHERE name = ? OR email = ?";
        $stmt = $this -> connect() -> prepare($sql);

        if(!$stmt -> execute([$name,$psw])){
            $stmt = null;
            header("location:../main.php?error=stmtfailed");
            exit();
        }

        if($stmt ->rowCount() === 0){
            $stmt = null;
            header("location:../main.php?error=usernotfound");
            exit();
        }
        $pswhashed = $stmt -> fetchAll();
        $comparepsw = password_verify($psw,$pswhashed[0]['password']);

        if($comparepsw == false){
            $stmt = null;
            header("location:../main.php?error=wrongpassword");
            exit();
        }else if($comparepsw == true){
            $sql = "SELECT * FROM users WHERE name = ? OR email = ? AND password = ?";
            $stmt = $this -> connect() -> prepare($sql);

            if(!$stmt -> execute([$name,$psw])){
                $stmt = null;
                header("location:../main.php?error=stmtfailed");
                exit();
            }

            if($stmt ->rowCount() === 0){
                $stmt = null;
                header("location:../main.php?error=usernotfound");
                exit();
            }
            $user = $stmt -> fetchAll();
            session_start();

            $_SESSION['userid'] = $user[0]['name'];
        }
        $stmt = null;
    }
}