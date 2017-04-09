<?php



if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}

$requete_livre =
    "SELECT livre_titre, livre_groupe, auteur_nom, auteur_prenom, COUNT(livre_groupe) AS cpt
    FROM livre l, auteur a
    WHERE l.auteur_id = a.auteur_id
    GROUP BY livre_groupe, livre_titre, auteur_nom, auteur_prenom";




$reponse_livre = $bdd->query($requete_livre);
$resultat_livre = $reponse_livre->fetchAll();



require $_dir["views"]."GestionNotices.php";