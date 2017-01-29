<?php
session_start();
require "load.php";



if(!empty($_GET['page']) && !preg_match('#[./\\\]+#',$_GET['page']) && is_file($_dir["controllers"].$_GET['page'].'.Controller.php'))
{

	include $_dir["controllers"].$_GET['page'].'.Controller.php';

}
elseif(empty($_GET['page']))
{

	include $_dir["controllers"].'Accueil.Controller.php';

}
else
{
	include $_dir["controllers"].'404.Controller.php';
}