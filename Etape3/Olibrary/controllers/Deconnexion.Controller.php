<?php

unset($_SESSION["connect"]);
session_destroy();


$_SESSION["erreur"]="Vous êtes bien déconnecté !";
header('Location:'. BASE_URL.'/Olibrary/connexion/');