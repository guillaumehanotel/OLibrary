<?php

if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}


$id = securify((int)$_GET['id']);



$requete_notice =
    "SELECT *
    FROM notice n
    WHERE notice_id = '$id'";


$reponse_notice = $bdd->query($requete_notice);
$resultat_notice = $reponse_notice->fetch();



$requete_exemplaire =
    "SELECT *
    FROM notice n, exemplaire e
    WHERE n.notice_id = e.exemplaire_notice_id
    AND n.notice_id = '$id'";


$reponse_exemplaire = $bdd->query($requete_exemplaire);
$resultat_exemplaire = $reponse_exemplaire->fetchAll();



require $_dir["views"]."GestionExemplaires.php";

