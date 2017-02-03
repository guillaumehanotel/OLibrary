<?php
require $_dir["views"]."Inscription.php";

if(!empty($_POST)){
    if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["repassword"]) &&
        isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repassword"])) {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];



            echo "okay";
    }
    else {
        echo "Merci de remplir tout les champs.";
    }
}