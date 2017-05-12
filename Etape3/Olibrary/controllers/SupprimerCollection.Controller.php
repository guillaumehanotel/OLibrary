<?php


$collection_id=securify((int)$_GET['id']);


/* REQUETE COLLECTION */

$requete_collection = "SELECT * FROM collection WHERE collection_id=$collection_id";
$reponse_collection=$bdd->query($requete_collection);
$resultat_collection=$reponse_collection->fetch();


/* REQUETE TOTAL EXEMPLAIRE */

$requete_exemplaire_cpt="SELECT COUNT(*) as total FROM collection c JOIN exemplaire ex ON ex.exemplaire_collection_id = c.collection_id WHERE c.collection_id=$collection_id";
$reponse_exemplaire_cpt = $bdd->query($requete_exemplaire_cpt);
$resultat_exemplaire_cpt=$reponse_exemplaire_cpt->fetch();

/* REQUETE TOTAL RESERVATION */

$requete_emprunt_cpt="SELECT COUNT(*) as total FROM collection c JOIN exemplaire ex ON ex.exemplaire_collection_id = c.collection_id JOIN emprunte e ON e.exemplaire_id = ex.exemplaire_id WHERE c.collection_id=$collection_id";
$reponse_emprunt_cpt = $bdd->query($requete_emprunt_cpt);
$resultat_emprunt_cpt=$reponse_emprunt_cpt->fetch();



if(!empty($_POST["delete_collection"])){

    $delete_collection=$bdd->query("DELETE FROM collection WHERE collection_id=$collection_id");

    header("Location:".BASE_URL."/autorites/");
}


require $_dir["views"]."SupprimerCollection.php";