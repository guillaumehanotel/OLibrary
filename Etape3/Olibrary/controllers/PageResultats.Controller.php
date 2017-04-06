<?php
$recherche=$_GET['recherche'];


$requetelivre=$bdd->query("SELECT * FROM livre l JOIN auteur a ON l.auteur_id = a.auteur_id WHERE l.livre_titre LIKE '%$recherche%'");
$requete_livre = $requetelivre->fetchAll();




require $_dir["views"]."PageResultats.php";





