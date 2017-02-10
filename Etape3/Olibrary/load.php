<?php
require('config.php');
require('function.php');



if(isset($_SESSION["is_admin"])){
    require('views/back/Header.php');
} else {
    require('views/front/Header.php');
}







/*
$base = mysql_connect($configs['MYSQL_HOST'],$configs['MYSQL_LOG'],$configs['MYSQL_PW']);
mysql_select_db($configs['MYSQL_DB'],$base);
mysql_query("SET NAMES 'utf8'");
*/

$bdd = new PDO("mysql:host=localhost;dbname=".$config["base"].";charset=utf8", 
$config["loginBDD"], $config["mdpBDD"]);
