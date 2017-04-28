<?php


if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}





require $_dir["views"]."MenuGestion.php";