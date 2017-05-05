<?php



if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}

$requete_commande=
	"SELECT *
	FROM utilisateur u, emprunte em, exemplaire ex, notice n
	WHERE u.user_num = em.user_num
	AND em.exemplaire_id = ex.exemplaire_id
	AND ex.exemplaire_notice_id = n.notice_id
	AND is_reservation =0 ";

$reponse_commande = $bdd->query($requete_commande);
$resultat_commande = $reponse_commande->fetchAll();

$requete_reservation=
	"SELECT *
	FROM utilisateur u, emprunte em, exemplaire ex, notice n
	WHERE u.user_num = em.user_num
	AND em.exemplaire_id = ex.exemplaire_id
	AND ex.exemplaire_notice_id = n.notice_id
	AND is_reservation =1";

$reponse_reservation = $bdd->query($requete_reservation);
$resultat_reservation = $reponse_reservation->fetchAll();






require $_dir["views"]."GestionEmprunteurs.php";