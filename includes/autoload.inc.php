<?php


spl_autoload_register("myAutoload");

function myAutoload($classname){
    $folder = "classes/";
    $ext = ".class.php";

    $fullpath = $folder . $classname . $ext;
    include_once $fullpath;
}