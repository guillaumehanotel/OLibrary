<?php

$recherche=$_GET['recherche'];


$requetelivre=$bdd->query("SELECT * FROM notice n JOIN auteur a ON n.notice_auteur_id = a.auteur_id WHERE n.notice_titre LIKE '%$recherche%'");
$requete_livre = $requetelivre->fetchAll();




require $_dir["views"]."PageResultats.php";





