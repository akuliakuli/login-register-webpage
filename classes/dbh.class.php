<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pass ="";
    private $db = "storage";
    protected function connect(){
        try {
            $dsn = "mysql:host" . $this ->host . ";dbname =" . $this ->db;
            $pdo = new PDO($dsn,$this ->user,$this ->pass);
            $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            $pdo -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            return $pdo;
        } catch (TypeError $a) {
            echo "ERROR :( " . $a->getMessage();
        }
    }
}