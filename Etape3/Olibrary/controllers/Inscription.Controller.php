<?php
require $_dir["views"]."Inscription.php";

if(!empty($_POST)){

    if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["repassword"]) &&
        isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repassword"])) {


        if( $_POST["password"] == $_POST["repassword"]) {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT)."\n";
            $repassword = password_hash($_POST['repassword'], PASSWORD_DEFAULT)."\n";

            $requete = "INSERT INTO utilisateur (user_nom,user_prenom,user_mail,user_mdp,is_admin)
              VALUES ('$nom','$prenom','$email','$password',FALSE)";
            $bdd->query($requete);

            header('Location: ' . BASE_URL . '/Olibrary/ ');
        }
        else{
            echo "Merci de rentrer le même mot de passe";
        }


    }
    else {
        echo "Merci de remplir tout les champs.";
    }
}

else {
}
