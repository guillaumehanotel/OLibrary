<?php

$notice_id=$_GET['id'];
$description=$bdd->query("SELECT * FROM notice n left outer JOIN exemplaire ex ON n.notice_id=ex.exemplaire_notice_id 
                                                         left outer JOIN emprunte em ON ex.exemplaire_id=em.exemplaire_id 
                                  WHERE n.notice_id=$notice_id ");
$description_livre = $description->fetch();

$requete_notice =
    "SELECT *
        FROM notice n, auteur a
        WHERE n.notice_auteur_id = a.auteur_id
        AND notice_id = '$notice_id'";

$reponse_notice = $bdd->query($requete_notice);
$resultat_notice = $reponse_notice->fetch();

$requeteresa=$bdd->query("SELECT * FROM emprunte em right outer JOIN exemplaire ex ON em.exemplaire_id=ex.exemplaire_id 
                                  WHERE ex.exemplaire_notice_id=$notice_id");
$requete_resa=$requeteresa->fetchAll();

$requete_exemplaire =
    "SELECT *
    FROM notice n, exemplaire e, fournisseur f, collection c, editeur ed
    WHERE n.notice_id = e.exemplaire_notice_id
    AND e.exemplaire_fournisseur_id = f.fournisseur_id
    AND e.exemplaire_collection_id = c.collection_id
    AND c.editeur_id = ed.editeur_id
    AND n.notice_id = '$notice_id'";

$reponse_exemplaire = $bdd->query($requete_exemplaire);
$resultat_exemplaire = $reponse_exemplaire->fetchAll();

date_default_timezone_set('UTC');
$dateJour = date("Y-m-d");

$maxDateEmprunt = strtotime(date("Y-m-d", strtotime($dateJour)) . " +3 week");
$maxDateEmprunt=date("Y-m-d",$maxDateEmprunt);
echo $maxDateEmprunt;


$user_num = $_SESSION['user_num'];

if(!empty($_POST['valideremprunt'])){

    $idexemplaire = $_POST['exemplaireid'];
    $dateRetour = $_POST['date'];

    if (!empty($dateRetour) && isset($dateRetour) &&
        !empty($idexemplaire) && isset($idexemplaire)) {

        $requete = "INSERT INTO emprunte(emprunt_date, emprunt_retour, is_reservation, user_num, exemplaire_id) 
                    VALUES(NOW(),'$dateRetour',FALSE ,$user_num,$idexemplaire)";
        $req=$bdd->query($requete);
    }
}

$alert=" ";

if(!empty($_POST['validerresa'])){

    $idexemplaire = $_POST['exemplaireid'];
    $dateEmprunt=$_POST['date_emprunt'];
    $dateRetour = $_POST['date'];

    if (!empty($dateRetour) && isset($dateRetour) &&
        !empty($idexemplaire) && isset($idexemplaire)) {

        if(strtotime($dateEmprunt) < strtotime($dateRetour))
        {
            $requete = "INSERT INTO emprunte(emprunt_date, emprunt_retour, is_reservation, user_num, exemplaire_id) 
                    VALUES('$dateEmprunt','$dateRetour',TRUE ,$user_num,$idexemplaire)";
            $req=$bdd->query($requete);
            echo "OKKKK";
        }
        else {
            $alert = "Veuillez entrer une date superieur";
            ?>
            <script>alert("ça marche pas wala")</script>
            <?php
        }

        $requete = "INSERT INTO emprunte(emprunt_date, emprunt_retour, is_reservation, user_num, exemplaire_id) 
                    VALUES('$dateEmprunt','$dateRetour',TRUE ,$user_num,$idexemplaire)";
        $req=$bdd->query($requete);

    }
}



require $_dir["views"]."DescriptionLivre.php";
