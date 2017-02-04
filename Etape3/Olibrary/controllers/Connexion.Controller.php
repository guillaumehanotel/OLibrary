<?php
require $_dir["views"]."Connexion.php";

if(!empty($_POST)){
    if(!empty($_POST["email"]) && !empty($_POST["password"]) &&
        isset($_POST["email"]) && isset($_POST["password"])){
        echo "ok";
    }

    else{
        echo "Merci de remplir tout les champs";
    }
}