<?php
/*require $_dir["views"]."Connexion.php";

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
}*/




if(!empty($_POST)){

    if(!empty($_POST["email"]) && !empty($_POST["password"]) &&
        isset($_POST["email"]) && isset($_POST["password"])){


        $email = $_POST["email"];

        //Si l'email existe dans la base
        if(DansBase($email,$bdd) == true){

            // On récupère l'utilisateur (sous forme de tableaux)
            $user=GetUser($email,$bdd);

            // compare le mdp rentré par l'utilisateur avec celui présent dans la base correspondant à l'email rentré
            //if(password_verify($_POST["password"],$user["user_mdp"])) {

                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['connect'] = true;

                // on déclare une nouvelle varianle session pour chaque caractéristique de l'utilisateur
                
                
                $_SESSION['user_num'] = $user['user_num'];
                $_SESSION['user_nom'] = $user['user_nom'];
                $_SESSION['user_prenom'] = $user['user_prenom'];
                $_SESSION['user_mail'] = $user['user_mail'];
                $_SESSION['is_admin'] = $user['is_admin'];
                     
                header('Location: ' . BASE_URL . '/Olibrary/connexion/ ');

/*
            } else {
                $_SESSION["erreur"] = "Mot de passe incorrect !";
            }
*/

        } else {
            $_SESSION["erreur"] = "Email incorrect !";
        }


    } else{
        $_SESSION['erreur'] = "Merci de remplir tout les champs";
    }


}else {
    // formulaire pas envoyé
}

if(!empty($_SESSION["erreur"])){
    echo "<div>".$_SESSION['erreur']."</div>";
    unset($_SESSION["erreur"]);
    //var_dump(password_verify($_POST['password'], $user['user_mdp']));
}

require $_dir["views"]."Connexion.php";