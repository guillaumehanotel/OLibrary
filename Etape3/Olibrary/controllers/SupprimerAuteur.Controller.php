<?php

$auteur_id=$_GET['id'];

$requete_auteur=$bdd->query("SELECT * FROM auteur WHERE auteur_id=$auteur_id");
$reqaut=$requete_auteur->fetchAll();

$requete_notice=$bdd->query("SELECT * FROM notice WHERE notice_auteur_id=$auteur_id");
$reqnot=$requete_notice->fetchAll();

$requete_emprunt=$bdd->query("SELECT * FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id 
                              JOIN emprunte em ON ex.exemplaire_id=em.exemplaire_id WHERE n.notice_auteur_id=$auteur_id");
$reqemp=$requete_emprunt->fetchAll();


if(!empty($_POST["delete_aut"])){
    $requete_aut=$bdd->query("DELETE FROM auteur WHERE auteur_id=$auteur_id");
    $reqnot=$requete_notice->fetchAll();

   /* DELETE FROM emprunte
WHERE exemplaire_id IN
    (SELECT em.exemplaire_id FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id
                              JOIN emprunte em ON ex.exemplaire_id=em.exemplaire_id WHERE n.notice_auteur_id=$auteur_id)*/


}

//SELECT * FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id WHERE notice_auteur_id=1

require $_dir["views"]."SupprimerAuteur.php";