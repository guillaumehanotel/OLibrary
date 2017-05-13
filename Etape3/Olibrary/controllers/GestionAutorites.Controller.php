<?php


// Enregistrer l'auteur
if(!empty($_POST["auteur"])){
    if(!empty($_POST["auteur_nom"]) && !empty($_POST["auteur_prenom"]) &&
        isset($_POST["auteur_nom"]) && isset($_POST["auteur_prenom"])){

        $requete = $bdd -> prepare("INSERT INTO auteur (auteur_nom,auteur_prenom) VALUES (:nom, :prenom)");
        $param = array(
          'nom' => securify($_POST['auteur_nom']),
          'prenom' => securify($_POST['auteur_prenom'])
        );

        $requete->execute($param);
        header('Location: '.BASE_URL.'/autorites/');
    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}


//Supprimer l'auteur
if (!empty($_POST["delete_aut"])){

}



// Enregistrer l'éditeur
if(!empty($_POST["editeur"])){
    if(!empty($_POST["editeur_nom"]) && isset($_POST["editeur_nom"])){


        $requete = $bdd -> prepare("INSERT INTO editeur (editeur_nom) VALUES (:nom)");
        $param = array(
            'nom' => securify($_POST['editeur_nom']),
        );
        $requete->execute($param);
        header('Location:' . BASE_URL . '/autorites/');
    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}



//Enregistrer le fournisseur
if(!empty($_POST["fournisseur"])){
    if(!empty($_POST["fournisseur_nom"]) && isset($_POST["fournisseur_nom"])){
        $requete = $bdd -> prepare("INSERT INTO fournisseur (fournisseur_nom) VALUES (:nom)");
        $param = array(
            'nom' => securify($_POST['fournisseur_nom']),
        );

        $requete->execute($param);
        header('Location: ' . BASE_URL . '/autorites/');
    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}



//Enregistrer la collection
if(!empty($_POST["collection"])) {

    if (!empty($_POST["collection_nom"]) && !empty($_POST["editeur_id"]) &&
        isset($_POST["collection_nom"]) && isset($_POST["editeur_id"])) {

        $requete = $bdd -> prepare("INSERT INTO collection (collection_nom,editeur_id) VALUES (:nom,:id)");

        $param = array(
            'nom' => securify($_POST['collection_nom']),
            'id' => securify(explode(" ", $_POST['editeur_id'])[0])
        );
        $requete->execute($param);

        header('Location: ' . BASE_URL . '/autorites/');
    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}








// Modifier l'auteur
if(!empty($_POST['edit_auteur'])){

    if(!empty($_POST['auteur_prenom']) && isset($_POST['auteur_prenom'])
        && !empty($_POST['auteur_nom']) && isset($_POST['auteur_nom'])
        && !empty($_POST['auteur_id']) && isset($_POST['auteur_id'])){


        $requete = $bdd -> prepare("UPDATE auteur SET
                                    auteur_prenom = :prenom,
                                    auteur_nom    = :nom
                                    WHERE auteur_id = :id
                                  ");

        $param = array(
            'prenom' => securify($_POST['auteur_prenom']),
            'nom' => securify($_POST['auteur_nom']),
            'id' => securify($_POST['auteur_id'])
        );

        $requete->execute($param);
        header('Location: ' . BASE_URL . '/autorites/');


    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}






// Modifier l'éditeur
if(!empty($_POST['edit_editeur'])){

    if(!empty($_POST['editeur_nom']) && isset($_POST['editeur_nom'])
        && !empty($_POST['editeur_id']) && isset($_POST['editeur_id'])){


        $requete = $bdd -> prepare("UPDATE editeur SET
                                    editeur_nom    = :nom
                                    WHERE editeur_id = :id
                                  ");

        $param = array(
            'nom' => securify($_POST['editeur_nom']),
            'id' => securify($_POST['editeur_id'])
        );

        $requete->execute($param);
        header('Location: ' . BASE_URL . '/autorites/');


    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}






// Modifier le fournisseur
if(!empty($_POST['edit_fournisseur'])){

    if(!empty($_POST['fournisseur_nom']) && isset($_POST['fournisseur_nom'])
        && !empty($_POST['fournisseur_id']) && isset($_POST['fournisseur_id'])){


        $requete = $bdd -> prepare("UPDATE fournisseur SET
                                    fournisseur_nom    = :nom
                                    WHERE fournisseur_id = :id
                                  ");

        $param = array(
            'nom' => securify($_POST['fournisseur_nom']),
            'id' => securify($_POST['fournisseur_id'])
        );

        $requete->execute($param);
        header('Location: ' . BASE_URL . '/autorites/');


    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}



// Modifier la collection
if(!empty($_POST['edit_collection'])){

    if(!empty($_POST['collection_nom']) && isset($_POST['collection_nom'])
        && !empty($_POST['collection_id']) && isset($_POST['collection_id'])
        && !empty($_POST['editeur_id']) && isset($_POST['editeur_id'])){


        $requete = $bdd -> prepare("UPDATE collection SET
                                    collection_nom    = :nom,
                                    editeur_id        = :editeur_id
                                    WHERE collection_id = :id
                                  ");

        $param = array(
            'nom' => securify($_POST['collection_nom']),
            'editeur_id' => securify($_POST['editeur_id']),
            'id' => securify($_POST['collection_id'])
        );

        $requete->execute($param);
        header('Location: ' . BASE_URL . '/autorites/');


    } else {
        $_SESSION["erreur"] = "Merci de remplir tout les champs";
    }
}

















$requete_sql = "SELECT * FROM collection c, editeur e WHERE e.editeur_id = c.editeur_id";
$requetecollection=$bdd->query($requete_sql);
$requete_collection = $requetecollection->fetchAll();



$requete_sql = "SELECT * FROM auteur";
$requeteauteur=$bdd->query($requete_sql);
$requete_auteur = $requeteauteur->fetchAll();


$requete_sql = "SELECT * FROM editeur";
$requeteediteur=$bdd->query($requete_sql);
$requete_editeur = $requeteediteur->fetchAll();



$requete_sql = "SELECT * FROM fournisseur";
$requetefournisseur=$bdd->query($requete_sql);
$requete_fournisseur = $requetefournisseur->fetchAll();







$editid= $bdd->query("SELECT * FROM editeur");
$editeur_id=$editid->fetchAll();

$autid= $bdd->query("SELECT * FROM auteur");
$auteur_id=$autid->fetchAll();

$collid= $bdd->query("SELECT * FROM collection ORDER BY collection_id");
$collection_id=$collid->fetchAll();

$fournid= $bdd->query("SELECT * FROM fournisseur");
$fournisseur_id=$fournid->fetchAll();












require $_dir["views"]."GestionAutorites.php";