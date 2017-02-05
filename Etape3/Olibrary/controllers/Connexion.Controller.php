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


require $_dir["views"]."Connexion.php";

if(!empty($_POST)){
    if(!empty($_POST["email"]) && !empty($_POST["password"]) &&
        isset($_POST["email"]) && isset($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $requete = "SELECT user_mail, user_mdp FROM utilisateur WHERE user_mail='$email'";
        $req = $bdd->query($requete);

        $user = $req->fetch(PDO::FETCH_OBJ);
       /* var_dump($requete);
        var_dump($user);
        var_dump($user['user_mdp']);
        var_dump($password);*/

        $passhach = '$2y$10$ies5lZIQFf6UDnlcjR3Jk.7BzPrCQeT00zlSuEonrTmFoSaL1Sv4y';



        if(password_verify($password,/*$user['user_mdp']*/$passhach)) {
            $_SESSION["connect"]=true;
            $_SESSION["user"]=$user['user_nom'];
            $_SESSION["admin"]=$user['is_admin'];
            echo "OKAYYYYYYYY";
            var_dump($user);
        }


        else {
            $_SESSION["erreur"]="Identification impossible. Verifiez vos identifiants";
        }

        if(!empty($_SESSION["erreur"])){
            echo "<div>".$_SESSION['erreur']."</div>";
            unset($_SESSION["erreur"]);
            var_dump(password_verify($_POST['password'], $user['user_mdp']));
        }


    }

    else{
        echo "Merci de remplir tout les champs";
    }
}