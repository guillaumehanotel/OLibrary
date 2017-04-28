<?php

define('ROOT_DIR', dirname(__FILE__));
define('ROOT',dirname(ROOT_DIR));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');

$url = $_SERVER['SERVER_NAME'] . dirname(__FILE__);
$array = explode('\\',$url);
$count = count($array);
$project_name = $array[$count-1];

define('PROJECT_NAME','/'.$project_name);


define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])).PROJECT_NAME);


//echo BASE_URL;

$_dir["controllers"] = "controllers/";
$_dir["views"] = "views/";
$_dir["css"] = "css/";

$config = array(
	"loginBDD" => "olibrary",
	"mdpBDD" => "erty",
	"base" => "bdd_olibrary",
	);

