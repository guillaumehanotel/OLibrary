<?php

if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}


if (!empty($_POST)){ // si le formulaire a été envoyé

    if(isset($_POST['date']) && !empty($_POST['date']) &&
        isset($_POST['titre']) && !empty($_POST['titre']) &&
        isset($_POST['synopsis']) && !empty($_POST['synopsis']) &&
        isset($_POST['auteur_id']) && !empty($_POST['auteur_id'])){

        $id = securify((int)$_GET['id']);

        $requete_notice = "SELECT * FROM notice n WHERE notice_id = '$id'";
        $reponse_notice = $bdd->query($requete_notice);
        $resultat_notice = $reponse_notice->fetch();



        if(!empty($resultat_notice)){

            $requete = $bdd->prepare("UPDATE notice SET
            notice_titre          = :titre,
            notice_date_parution  = :date,
            notice_synopsis       = :synopsis,
            notice_auteur_id      = :auteur
            WHERE notice_id       = :id");



            $date = $_POST['date'].'-01-01';

            $date = date ('Y-m-d', strtotime($date));



            $param = array(
                'titre' => securify($_POST['titre']),
                'date' => $date,
                'synopsis' => securify($_POST['synopsis']),
                'auteur' => securify(explode(" ",$_POST['auteur_id'])[0]),
                'id' => $id
            );

            $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

            $requete->execute($param);


            header("Refresh:0");
            //header('Location: '.BASE_URL.'/exemplaires/');

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


    /* REQUETE DES AUTEURS POUR LE FORMRULAIRE SELECT D'EDITION DE NOTICE*/

    $requete_auteur = "SELECT * FROM auteur";
    $reponse_auteur = $bdd->query($requete_auteur);
    $auteurs = $reponse_auteur->fetchAll();




    /* REQUETE DES EXEMPLAIRES LIES A LA NOTICE */
    $requete_exemplaire =
        "SELECT *
    FROM notice n, exemplaire e, fournisseur f, collection c, editeur ed
    WHERE n.notice_id = e.exemplaire_notice_id
    AND e.exemplaire_fournisseur_id = f.fournisseur_id
    AND e.exemplaire_collection_id = c.collection_id
    AND c.editeur_id = ed.editeur_id
    AND n.notice_id = '$id'";

    $reponse_exemplaire = $bdd->query($requete_exemplaire);
    $resultat_exemplaire = $reponse_exemplaire->fetchAll();



    /* REQUETE DES FOURNISSEURS POUR LE FORMULAIRE SELECT D'EDITION D'EXEMPLAIRE */

    $requete_fournisseur = "SELECT * FROM fournisseur";
    $reponse_fournisseur = $bdd->query($requete_fournisseur);
    $fournisseurs = $reponse_fournisseur->fetchAll();

    /* REQUETE DES EDITEURS POUR LE FORMULAIRE SELECT D'EDITION D'EXEMPLAIRE */

    $requete_editeur = "SELECT * FROM editeur";
    $reponse_editeur = $bdd->query($requete_editeur);
    $editeurs = $reponse_editeur->fetchAll();

    /* REQUETE DES COLLECTIONS POUR LE FORMULAIRE SELECT D'EDITION D'EXEMPLAIRE */

    $requete_collection = "SELECT * FROM collection";
    $reponse_collection = $bdd->query($requete_collection);
    $collections = $reponse_collection->fetchAll();







    require $_dir["views"] . "GestionExemplaires.php";

} else {

}