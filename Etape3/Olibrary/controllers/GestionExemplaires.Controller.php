<?php

if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}


if (!empty($_POST)){ // si le formulaire a été envoyé

    if(isset($_POST['date']) && !empty($_POST['date']) &&
        isset($_POST['titre']) && !empty($_POST['titre']) &&
        isset($_POST['synopsis']) && !empty($_POST['synopsis'])){

        $id = securify((int)$_GET['id']);

        $requete_notice = "SELECT * FROM notice n WHERE notice_id = '$id'";
        $reponse_notice = $bdd->query($requete_notice);
        $resultat_notice = $reponse_notice->fetch();




        if(!empty($resultat_notice)){

            $requete = $bdd->prepare("UPDATE notice SET
            notice_titre      = :titre
            WHERE notice_id   = :id");







        }





    }



} elseif(!empty($_GET['id'])) { //sinon on affiche les infos


    $id = securify((int)$_GET['id']);

/* REQUETE DE LA NOTICE ATCUELLE */
    $requete_notice =
        "SELECT *
        FROM notice n, auteur a
        WHERE n.notice_auteur_id = a.auteur_id
        AND notice_id = '$id'";

    $reponse_notice = $bdd->query($requete_notice);
    $resultat_notice = $reponse_notice->fetch();




/* REQUETE DES EXEMPLAIRES LIES A LA NOTICE */
    $requete_exemplaire =
        "SELECT *
    FROM notice n, exemplaire e
    WHERE n.notice_id = e.exemplaire_notice_id
    AND n.notice_id = '$id'";


    $reponse_exemplaire = $bdd->query($requete_exemplaire);
    $resultat_exemplaire = $reponse_exemplaire->fetchAll();


    require $_dir["views"] . "GestionExemplaires.php";

} else {

}