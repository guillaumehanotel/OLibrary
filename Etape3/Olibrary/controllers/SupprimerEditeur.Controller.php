<?php


$editeur_id=securify((int)$_GET['id']);


/* REQUETE EDITEUR */

$requete_editeur = "SELECT * FROM editeur WHERE editeur_id=$editeur_id";
$reponse_editeur=$bdd->query($requete_editeur);
$resultat_editeur=$reponse_editeur->fetch();


/* REQUETE DES COLLECTIONS DE L'AUTEUR */
$requete_collection=$bdd->query("SELECT * FROM collection WHERE editeur_id=$editeur_id");
$resultat_collection=$requete_collection->fetchAll();


/* REQUETE TOTAL EXEMPLAIRE */

$requete_exemplaire_cpt="SELECT COUNT(*) as total FROM collection c JOIN exemplaire ex ON ex.exemplaire_collection_id = c.collection_id WHERE c.editeur_id=$editeur_id";
$reponse_exemplaire_cpt = $bdd->query($requete_exemplaire_cpt);
$resultat_exemplaire_cpt=$reponse_exemplaire_cpt->fetch();

/* REQUETE TOTAL RESERVATION */

$requete_emprunt_cpt="SELECT COUNT(*) as total FROM collection c JOIN exemplaire ex ON ex.exemplaire_collection_id = c.collection_id JOIN emprunte e ON e.exemplaire_id = ex.exemplaire_id WHERE c.editeur_id=$editeur_id";
$reponse_emprunt_cpt = $bdd->query($requete_emprunt_cpt);
$resultat_emprunt_cpt=$reponse_emprunt_cpt->fetch();


/* REQUETE TOTAL COLLECTIONS */

$requete_collection_cpt="SELECT COUNT(*) as total FROM collection WHERE editeur_id=$editeur_id";
$reponse_collection_cpt = $bdd->query($requete_collection_cpt);
$resultat_collection_cpt=$reponse_collection_cpt->fetch();



if(!empty($_POST["delete_editeur"])){

    $delete_aut=$bdd->query("DELETE FROM editeur WHERE editeur_id=$editeur_id");

    header("Location:".BASE_URL."/autorites/");
}


require $_dir["views"]."SupprimerEditeur.php";