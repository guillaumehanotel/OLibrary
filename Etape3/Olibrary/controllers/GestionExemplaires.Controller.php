<?php

if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}



if (!empty($_POST['submit_notice'])){ // si le formulaire a été envoyé

    if(isset($_POST['date']) && !empty($_POST['date']) &&
        isset($_POST['titre']) && !empty($_POST['titre']) &&
        isset($_POST['synopsis']) && !empty($_POST['synopsis']) &&
        isset($_POST['auteur_id']) && !empty($_POST['auteur_id'])){

        $id = securify((int)$_GET['id']);

        $requete_notice = "SELECT * FROM notice n WHERE notice_id = '$id'";
        $resultat_notice = getResultatRequete($bdd, $requete_notice);



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

            //$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $requete->execute($param);

            header("Refresh:0");
            //header('Location: '.BASE_URL.'/exemplaires/');
        }
    }


} elseif(!empty($_POST['create_exemplaire'])){


    if(isset($_POST['livre_ISBN']) && !empty($_POST['livre_ISBN']) &&
        isset($_POST['editeur_id']) && !empty($_POST['editeur_id']) &&
        isset($_POST['collection_id']) && !empty($_POST['collection_id']) &&
        isset($_POST['fournisseur_id']) && !empty($_POST['fournisseur_id'])) {

        $id = securify((int)$_GET['id']);

        $requete_notice = "SELECT * FROM notice n WHERE notice_id = '$id'";
        $resultat_notice = getResultatRequete($bdd, $requete_notice);


        $requete =  $bdd->prepare("INSERT INTO exemplaire (
                                                exemplaire_ISBN,
                                                exemplaire_notice_id,
                                                exemplaire_collection_id,
                                                exemplaire_fournisseur_id
                                                )
                                                VALUES
                                                (
                                                :isbn,
                                                :id,
                                                :collection_id,
                                                :fournisseur_id
                                                )
                                                ");


        $param = array(
            'isbn' => securify($_POST['livre_ISBN']),
            'id' => $id,
            'collection_id' => securify($_POST['collection_id']),
            'fournisseur_id' => securify(explode(" ",$_POST['fournisseur_id'])[0])
        );


        $requete->execute($param);
        header("Refresh:0");



    }

} elseif(!empty($_POST['submit_exemplaire'])) {

    if(isset($_POST['exemplaire_id']) && !empty($_POST['exemplaire_id']) &&
        isset($_POST['isbn']) && !empty($_POST['isbn']) &&
        isset($_POST['editeur_id']) && !empty($_POST['editeur_id']) &&
        isset($_POST['collection_id']) && !empty($_POST['collection_id']) &&
        isset($_POST['fournisseur_id']) && !empty($_POST['fournisseur_id'])) {

        $id = securify((int)$_GET['id']);

        $requete_notice = "SELECT * FROM notice n WHERE notice_id = '$id'";
        $resultat_notice = getResultatRequete($bdd, $requete_notice);


        $requete =  $bdd->prepare("UPDATE exemplaire SET
        exemplaire_ISBN             = :isbn,
        exemplaire_collection_id    = :collection_id,
        exemplaire_fournisseur_id   = :fournisseur_id
        WHERE exemplaire_id         = :id");


        $param = array(

            'isbn' => securify($_POST['isbn']),
            'collection_id' => securify($_POST['collection_id']),
            'fournisseur_id' => securify($_POST['fournisseur_id']),
            'id' => securify($_POST['exemplaire_id'])
        );



        $requete->execute($param);
        header("Refresh:0");


    }



} elseif(!empty($_GET['id'])) { //sinon on affiche les infos


    $id = securify((int)$_GET['id']);

/* REQUETE DE LA NOTICE ATCUELLE */

    $requete_notice =
        "SELECT *
        FROM notice n, auteur a
        WHERE n.notice_auteur_id = a.auteur_id
        AND notice_id = '$id'";

    $resultat_notice = getResultatRequete($bdd, $requete_notice);


    /* REQUETE DES AUTEURS POUR LE FORMRULAIRE SELECT D'EDITION DE NOTICE*/

    $requete_auteur = "SELECT * FROM auteur";
    $auteurs =  getResultatsRequete($bdd, $requete_auteur);


    /* REQUETE DES EXEMPLAIRES LIES A LA NOTICE */
    $requete_exemplaire =
        "SELECT *
    FROM notice n, exemplaire e, fournisseur f, collection c, editeur ed
    WHERE n.notice_id = e.exemplaire_notice_id
    AND e.exemplaire_fournisseur_id = f.fournisseur_id
    AND e.exemplaire_collection_id = c.collection_id
    AND c.editeur_id = ed.editeur_id
    AND n.notice_id = '$id'";

    $resultat_exemplaire =  getResultatsRequete($bdd, $requete_exemplaire);



    /* REQUETE DES FOURNISSEURS POUR LE FORMULAIRE SELECT D'EDITION D'EXEMPLAIRE */

    $requete_fournisseur = "SELECT * FROM fournisseur";
    $fournisseurs = getResultatsRequete($bdd, $requete_fournisseur);

    /* REQUETE DES EDITEURS POUR LE FORMULAIRE SELECT D'EDITION D'EXEMPLAIRE */

    $requete_editeur = "SELECT * FROM editeur";
    $editeurs = getResultatsRequete($bdd, $requete_editeur);

    /* REQUETE DES COLLECTIONS POUR LE FORMULAIRE SELECT D'EDITION D'EXEMPLAIRE */

    $requete_collection = "SELECT * FROM collection";
    $collections = getResultatsRequete($bdd, $requete_collection);

    /* REQUETE NB EXEMPLAIRE */
    $requete_nb_exemplaire = "SELECT COUNT(exemplaire_id) AS cpt FROM notice n, exemplaire e WHERE e.exemplaire_notice_id = n.notice_id AND n.notice_id = '$id'";
    $resultat_nb_exemplaire =  getResultatRequete($bdd, $requete_nb_exemplaire);




    require $_dir["views"] . "GestionExemplaires.php";

} else {
}