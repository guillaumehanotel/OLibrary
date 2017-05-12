<?php



$auteur_id=securify((int)$_GET['id']);


/* REQUETE AUTEUR */
$requete_auteur=$bdd->query("SELECT * FROM auteur WHERE auteur_id=$auteur_id");
$reqaut=$requete_auteur->fetch();

/* REQUETE DES NOTICES DE L'AUTEUR */
$requete_notice=$bdd->query("SELECT * FROM notice WHERE notice_auteur_id=$auteur_id");
$reqnot=$requete_notice->fetchAll();


/* REQUETE TOTAL EXEMPLAIRE */

$requete_exemplaire_cpt="SELECT COUNT(*) as total FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id WHERE n.notice_auteur_id=$auteur_id";
$reponse_exemplaire_cpt = $bdd->query($requete_exemplaire_cpt);
$resultat_exemplaire_cpt=$reponse_exemplaire_cpt->fetch();

/* REQUETE TOTAL RESERVATION */

$requete_emprunt_cpt="SELECT COUNT(*) as total FROM notice n JOIN exemplaire ex ON n.notice_id = ex.exemplaire_notice_id JOIN emprunte e ON e.exemplaire_id = ex.exemplaire_id WHERE n.notice_auteur_id=$auteur_id";
$reponse_emprunt_cpt = $bdd->query($requete_emprunt_cpt);
$resultat_emprunt_cpt=$reponse_emprunt_cpt->fetch();


/* REQUETE TOTAL NOTICE */

$requete_notice_cpt="SELECT COUNT(*) as total FROM notice n WHERE n.notice_auteur_id=$auteur_id";
$reponse_notice_cpt = $bdd->query($requete_notice_cpt);
$resultat_notice_cpt=$reponse_notice_cpt->fetch();



if(!empty($_POST["delete_aut"])){

    $delete_aut=$bdd->query("DELETE FROM auteur WHERE auteur_id=$auteur_id");

    header("Location:".BASE_URL."/autorites/");
}


require $_dir["views"]."SupprimerAuteur.php";