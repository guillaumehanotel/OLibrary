<?php
if(!isset($_SESSION["connect"]))
{
    $_SESSION["erreur"] = "Vous devez vous connecter pour accéder a cette page ";
    //$token_error = true;
    header('$requete_livre =Location: ' . BASE_URL . '/connexion/');
}
    $requete_emprunt =
    "SELECT *
    FROM utilisateur u, emprunte e, exemplaire ex, notice n
    where u.user_num = e.user_num
    AND e.exemplaire_id = ex.exemplaire_id
    AND ex.exemplaire_notice_id = n.notice_id
    ORDER BY emprunt_retour";

$resultat_emprunt = getResultatsRequete($bdd, $requete_emprunt);


require $_dir["views"]."GestionDocuments.php";