<?php

define('ROOT_DIR', dirname(__FILE__));
define('ROOT',dirname(ROOT_DIR));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');


define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));



$_dir["controllers"] = "controllers/";
$_dir["views"] = "views/";
$_dir["css"] = "css/";

$config = array(
	"loginBDD" => "olibrary",
	"mdpBDD" => "erty",
	"base" => "bdd_olibrary",
	);

	