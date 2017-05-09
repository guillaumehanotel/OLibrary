<?php



if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}




$requete_livre =
    "SELECT notice_titre, notice_id, auteur_nom, auteur_prenom, count(exemplaire_id) AS cpt
    FROM auteur a, notice n
    LEFT JOIN exemplaire e
    ON e.exemplaire_notice_id = n.notice_id
    WHERE n.notice_auteur_id = a.auteur_id
    GROUP BY notice_titre, notice_id, auteur_nom, auteur_prenom";

$reponse_livre = $bdd->query($requete_livre);
$resultat_livre = $reponse_livre->fetchAll();


$requete_auteur = "SELECT * FROM auteur";
$reponse_auteur = $bdd->query($requete_auteur);
$resultat_auteur = $reponse_auteur->fetchAll();


if(!empty($_POST['submit_notice'])){
    if(isset($_POST['livre_titre']) && !empty($_POST['livre_titre']) &&
       isset($_POST['date']) && !empty($_POST['date']) &&
       isset($_POST['livre_auteur']) && !empty($_POST['livre_auteur']) &&
        isset($_POST['synopsis']) && !empty($_POST['synopsis'])){



        $requete = $bdd -> prepare("INSERT INTO notice (
                                                notice_titre,
                                                notice_date_parution,
                                                notice_synopsis,
                                                notice_auteur_id
                                              )
                                              VALUES
                                              (
                                                :titre,
                                                :date_parution,
                                                :synopsis,
                                                :auteur
                                              )"
        );

        $param = array(
            'titre' => securify($_POST['livre_titre']),
            'date_parution' => $_POST['date'],
            'synopsis' => securify($_POST['synopsis']),
            'auteur' => securify(explode(" ",$_POST['livre_auteur'])[0])
        );

        $requete->execute($param);

        header('Location: '.BASE_URL.'/notices/');



    } else {
        $_SESSION['erreur'] = "Merci de remplir tout les champs";
    }

}


require $_dir["views"]."GestionNotices.php";