<?php

$recherche=securify($_GET['recherche']);


$requetelivre=$bdd->query(
    "SELECT *
     FROM notice n
     JOIN auteur a
     ON n.notice_auteur_id = a.auteur_id
     WHERE n.notice_titre
     LIKE '%$recherche%'
     OR a.auteur_nom
     LIKE '%$recherche%'
     OR a.auteur_prenom
     LIKE '%$recherche%'
     ");
$requete_livre = $requetelivre->fetchAll();




require $_dir["views"]."PageResultats.php";





