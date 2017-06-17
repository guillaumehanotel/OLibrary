<?php



if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}

// Requete récupérant tous les tuples de la table emprunt
$requete_pret=
	"SELECT *
	FROM utilisateur u, emprunte em, exemplaire ex, notice n
	WHERE u.user_num = em.user_num
	AND em.exemplaire_id = ex.exemplaire_id
	AND ex.exemplaire_notice_id = n.notice_id ";

$resultat_pret = getResultatsRequete($bdd, $requete_pret);


// Seulement les emprunts
$requete_emprunt = $requete_pret . " AND is_reservation = 0";
$resultat_emprunt = getResultatsRequete($bdd,$requete_emprunt);

// Seulement les réservations
$requete_reservation = $requete_pret . " AND is_reservation = 1";
$resultat_reservation = getResultatsRequete($bdd,$requete_reservation);

// Seulement les emprunts pas en retard
$requete_emprunt_ok = $requete_emprunt . " AND em.emprunt_retour > now()";
$resultat_emprunt_ok = getResultatsRequete($bdd, $requete_emprunt_ok);

// Seulement les emprunts en retard
$requete_emprunt_retard = $requete_emprunt . " AND em.emprunt_retour < now()";
$resultat_emprunt_retard = getResultatsRequete($bdd, $requete_emprunt_retard);


// Compte le nb d'emprunt en retard
$requete_cpt_retard=
    "SELECT COUNT(ex.exemplaire_id) AS cpt
	FROM utilisateur u, emprunte em, exemplaire ex, notice n
	WHERE u.user_num = em.user_num
	AND em.exemplaire_id = ex.exemplaire_id
	AND ex.exemplaire_notice_id = n.notice_id
	AND is_reservation = 0
	AND em.emprunt_retour < now()";

$resultat_cpt_retard = getResultatRequete($bdd, $requete_cpt_retard);


require $_dir["views"]."GestionEmprunteurs.php";