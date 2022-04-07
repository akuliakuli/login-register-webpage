<?php 
include "autoload.inc.php";


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $psw = $_POST['psw'];
    $pswrep = $_POST['pswrep'];
    $email = $_POST['email'];

    $signup = new Contr($name,$psw,$pswrep,$email);
    $signup -> signUser();

    header("location:../main.php?error=none");

}