<?php
require('config.php');
require('function.php');

$bdd = new PDO("mysql:host=localhost;dbname=".$config["base"].";charset=utf8",
    $config["loginBDD"], $config["mdpBDD"]);


if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1){
    require('views/back/Header.php');
} else  {
    require('views/front/Header.php');
}



