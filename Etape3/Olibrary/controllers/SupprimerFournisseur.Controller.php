<?php


$fournisseur_id=securify((int)$_GET['id']);


/* REQUETE FOURNISSEUR */

$requete_fournisseur = "SELECT * FROM fournisseur WHERE fournisseur_id=$fournisseur_id";
$reponse_fournisseur=$bdd->query($requete_fournisseur);
$resultat_fournisseur=$reponse_fournisseur->fetch();


/* REQUETE TOTAL EXEMPLAIRE */

$requete_exemplaire_cpt="SELECT COUNT(*) as total FROM fournisseur f JOIN exemplaire ex ON ex.exemplaire_fournisseur_id = f.fournisseur_id WHERE f.fournisseur_id=$fournisseur_id";
$reponse_exemplaire_cpt = $bdd->query($requete_exemplaire_cpt);
$resultat_exemplaire_cpt=$reponse_exemplaire_cpt->fetch();

/* REQUETE TOTAL RESERVATION */

$requete_emprunt_cpt="SELECT COUNT(*) as total FROM fournisseur f JOIN exemplaire ex ON ex.exemplaire_fournisseur_id = f.fournisseur_id JOIN emprunte e ON e.exemplaire_id = ex.exemplaire_id WHERE f.fournisseur_id=$fournisseur_id";
$reponse_emprunt_cpt = $bdd->query($requete_emprunt_cpt);
$resultat_emprunt_cpt=$reponse_emprunt_cpt->fetch();



if(!empty($_POST["delete_fournisseur"])){

    $delete_fourni=$bdd->query("DELETE FROM fournisseur WHERE fournisseur_id=$fournisseur_id");

    header("Location:".BASE_URL."/autorites/");
}


require $_dir["views"]."SupprimerFournisseur.php";