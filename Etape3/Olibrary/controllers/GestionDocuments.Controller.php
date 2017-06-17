<?php

if(!isset($_SESSION["connect"]))
{
    $_SESSION["erreur"] = "Vous devez vous connecter pour accéder a cette page ";
    //$token_error = true;
    header('$requete_livre =Location: ' . BASE_URL . '/connexion/');
}


    $requete = "SELECT *
    FROM utilisateur u, emprunte e, exemplaire ex, notice n
    where u.user_num = e.user_num
    AND e.exemplaire_id = ex.exemplaire_id
    AND ex.exemplaire_notice_id = n.notice_id ";


    $requete_emprunt = $requete ."AND e.is_reservation = 0
                                  ORDER BY emprunt_retour";

    $requete_resa = $requete ."AND e.is_reservation = 1
                               ORDER BY emprunt_retour";



    $resultat_emprunt = getResultatsRequete($bdd, $requete_emprunt);

    $resultat_resa = getResultatsRequete($bdd, $requete_resa);




require $_dir["views"]."GestionDocuments.php";