<?php



if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}

$requete_livre =
    "SELECT notice_titre, notice_id, auteur_nom, auteur_prenom, count(notice_id) AS cpt
    FROM notice n, auteur a, exemplaire e
    WHERE n.notice_auteur_id = a.auteur_id
    AND e.exemplaire_notice_id = n.notice_id
    GROUP BY notice_titre, notice_id, auteur_nom, auteur_prenom";

$reponse_livre = $bdd->query($requete_livre);
$resultat_livre = $reponse_livre->fetchAll();


$requete_auteur = "SELECT * FROM auteur";
$reponse_auteur = $bdd->query($requete_auteur);
$resultat_auteur = $reponse_auteur->fetchAll();

/*
if(!empty($_POST['submit_notice'])){
    if(isset($_POST['livre_titre']) && !empty($_POST['livre_titre']) &&
       isset($_POST['livre_date'])    )

}*/








require $_dir["views"]."GestionNotices.php";