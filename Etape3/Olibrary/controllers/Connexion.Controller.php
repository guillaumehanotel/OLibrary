<?php
require $_dir["views"]."Connexion.php";

if(!empty($_POST)){
    if(!empty($_POST["email"]) && !empty($_POST["password"]) &&
        isset($_POST["email"]) && isset($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $requete = "SELECT * FROM utilisateur WHERE user_mail='$email'
        AND user_mdp='$password'";
        $req = $bdd->query($requete);

        $user = $req->fetch();

        if(!empty($user)){
            $_SESSION["connect"]=true;
            $_SESSION["user"]=$user["user_nom"];
            $_SESSION["admin"]=$user["is_admin"];
            header()
        }

        else {
            $_SESSION["erreur"]="Identification impossible. Verifiez vos identifiants";
        }

        if(!empty($_SESSION["erreur"])){
            echo "<div>".$_SESSION['erreur']."</div>";
            unset($_SESSION["erreur"]);
        }


    }

    else{
        echo "Merci de remplir tout les champs";
    }
}