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
    #AND em.exemplaire_id=e.exemplaire_id
    AND n.notice_id = '$notice_id'";

$reponse_exemplaire = $bdd->query($requete_exemplaire);
$resultat_exemplaire = $reponse_exemplaire->fetchAll();





require $_dir["views"]."DescriptionLivre.php";
