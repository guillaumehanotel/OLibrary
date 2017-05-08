<?php



$auteur_id=securify((int)$_GET['id']);


/* REQUETE AUTEUR */
$requete_auteur=$bdd->query("SELECT * FROM auteur WHERE auteur_id=$auteur_id");
$reqaut=$requete_auteur->fetch();

/* REQUETE DES NOTICES DE L'AUTEUR */
$requete_notice=$bdd->query("SELECT * FROM notice WHERE notice_auteur_id=$auteur_id");
$reqnot=$requete_notice->fetchAll();


/* REQUETE TOTAL EXEMPLAIRE */

$requete_exemplaire="SELECT COUNT(*) as total FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id WHERE n.notice_auteur_id=$auteur_id";
$reponse_exemplaire = $bdd->query($requete_exemplaire);
$resultat_exemplaire=$reponse_exemplaire->fetch();

/* REQUETE TOTAL RESERVATION */

$requete_emprunt="SELECT COUNT(*) as total FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id JOIN emprunte e ON e.exemplaire_id = ex.exemplaire_id WHERE n.notice_auteur_id=$auteur_id";
$reponse_emprunt = $bdd->query($requete_emprunt);
$resultat_emprunt=$reponse_emprunt->fetch();




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