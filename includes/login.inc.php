<?php 
include "autoload.inc.php";


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $psw = $_POST['psw'];

    $login = new Logincontr($name,$psw);
    $login -> loginUser();

    header("location:../main.php?error=none");

}