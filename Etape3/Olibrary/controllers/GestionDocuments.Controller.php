<?php
if(!isset($_SESSION["connect"]))
{
    $_SESSION["erreur"] = "Vous devez vous connecter pour accéder a cette page ";
    //$token_error = true;
    header('$requete_livre =Location: ' . BASE_URL . '/connexion/');
}
    $requete_emprunt =
    "SELECT *
    FROM emprunte e, exemplaire ex, notice n
    Where e.exemplaire_id = ex.exemplaire_id
    AND ex.exemplaire_notice_id = n.notice_id
    ORDER BY emprunt_retour";

$reponse_emprunt = $bdd->query($requete_emprunt);
$resultat_emprunt = $reponse_emprunt->fetchAll();




require $_dir["views"]."GestionDocuments.php";