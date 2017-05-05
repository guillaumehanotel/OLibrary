<?php


if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}

    $requete_utilisateur =
        "SELECT user_num, user_nom, user_prenom, user_mail, is_admin 
        FROM utilisateur";

    $reponse_utilisateur = $bdd->query($requete_utilisateur);
    $resultat_utilisateur = $reponse_utilisateur->fetchAll();

require $_dir["views"]."GestionUtilisateurs.php";

