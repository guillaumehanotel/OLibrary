<?php


// Enregistrer l'auteur
if(!empty($_POST["auteur"])){
    if(!empty($_POST["auteur_nom"]) && !empty($_POST["auteur_prenom"]) &&
        isset($_POST["auteur_nom"]) && isset($_POST["auteur_prenom"])){


        $requete = $bdd -> prepare("INSERT INTO auteur (
                                                auteur_nom,
                                                auteur_prenom
                                              )
                                              VALUES
                                              (
                                                :nom,
                                                :prenom
                                              )"
                                    );

        $param = array(
          'nom' => securify($_POST['auteur_nom']),
          'prenom' => securify($_POST['auteur_prenom'])
        );


        $requete->execute($param);



        header('Location: ' . BASE_URL . '/autorites/');
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

$requeteauteur=$bdd->query("SELECT * FROM auteur");
$requete_auteur = $requeteauteur->fetchAll();




// Enregistrer l'éditeur
if(!empty($_POST["editeur"])){
    if(!empty($_POST["editeur_nom"]) && isset($_POST["editeur_nom"])){

        $requete = $bdd -> prepare("INSERT INTO editeur (
                                                editeur_nom
                                                )
                                                VALUES
                                                (
                                                :nom
                                                )"
        );

        $param = array(
            'nom' => securify($_POST['editeur_nom']),
        );


        $requete->execute($param);




        header('Location: ' . BASE_URL . '/autorites/');
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

$requeteediteur=$bdd->query("SELECT * FROM editeur");
$requete_editeur = $requeteediteur->fetchAll();






//Enregistrer le fournisseur
if(!empty($_POST["fournisseur"])){
    if(!empty($_POST["fournisseur_nom"]) && isset($_POST["fournisseur_nom"])){


        $requete = $bdd -> prepare("INSERT INTO fournisseur (
                                                fournisseur_nom
                                                )
                                                VALUES
                                                (
                                                :nom
                                                )"
        );

        $param = array(
            'nom' => securify($_POST['fournisseur_nom']),
        );

        $requete->execute($param);


        header('Location: ' . BASE_URL . '/autorites/');
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

$requetefournisseur=$bdd->query("SELECT * FROM fournisseur");
$requete_fournisseur = $requetefournisseur->fetchAll();




//Enregistrer la collection
if(!empty($_POST["collection"])) {

    if (!empty($_POST["collection_nom"]) && !empty($_POST["editeur_id"]) &&
        isset($_POST["collection_nom"]) && isset($_POST["editeur_id"])) {


        $requete = $bdd -> prepare("INSERT INTO collection (
                                                collection_nom,
                                                editeur_id
                                                )
                                                VALUES
                                                (
                                                :nom,
                                                :id
                                                )"
        );

        $param = array(
            'nom' => securify($_POST['collection_nom']),
            'id' => securify(explode(" ", $_POST['editeur_id'])[0])
        );


        $requete->execute($param);



        header('Location: ' . BASE_URL . '/autorites/');
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

$requetecollection=$bdd->query("SELECT * FROM collection");
$requete_collection = $requetecollection->fetchAll();








$editid= $bdd->query("SELECT * FROM editeur");
$editeur_id=$editid->fetchAll();

$autid= $bdd->query("SELECT * FROM auteur");
$auteur_id=$autid->fetchAll();

$collid= $bdd->query("SELECT * FROM collection ORDER BY collection_id");
$collection_id=$collid->fetchAll();

$fournid= $bdd->query("SELECT * FROM fournisseur");
$fournisseur_id=$fournid->fetchAll();







//Enregistrer le livre
if(!empty($_POST["livre"])) {

    if (!empty($_POST["livre_ISBN"]) && !empty($_POST["livre_titre"]) && !empty($_POST["nb_exemplaire"]) && !empty($_POST["date"]) && !empty($_POST["synopsis"]) &&
        !empty($_POST["auteur_id"]) && !empty($_POST["collection_id"]) && !empty($_POST["fournisseur_id"]) &&

        isset($_POST["livre_ISBN"]) && isset($_POST["livre_titre"]) && isset($_POST["nb_exemplaire"]) && isset($_POST["date"]) && isset($_POST["synopsis"]) &&
        isset($_POST["auteur_id"]) && isset($_POST["collection_id"]) && isset($_POST["fournisseur_id"])) {

        $livre_ISBN = $_POST["livre_ISBN"];
        $livre_titre = $_POST["livre_titre"];
        $nb_exemplaire = $_POST["nb_exemplaire"];
        $date =$_POST["date"];
        $synopsis = $_POST["synopsis"];
        $auteur_id = $_POST["auteur_id"];
        $collection_id = $_POST["collection_id"];
        $fournisseur_id = $_POST["fournisseur_id"];

        $auteur_id1 = explode(" ", $auteur_id);
        $collection_id1= explode(" ", $collection_id);
        $fournisseur_id1= explode(" ", $fournisseur_id);

        $requete = "INSERT INTO livre (
                                livre_ISBN,
                                livre_titre,
                                nb_exemplaire,
                                date_parution,
                                synopsis,
                                auteur_id,
                                collection_id,
                                fournisseur_id
                              )
                              VALUES
                              (
                                '$livre_ISBN',
                                '$livre_titre',
                                '$nb_exemplaire',
                                '$date',
                                '$synopsis',
                                '$auteur_id1[0]',
                                '$collection_id1[0]',
                                '$fournisseur_id1[0]'
                              )";

        $bdd->query($requete);
        header('Location: ' . BASE_URL . '/autorites/');


    }
    else {
        echo "Merci de remplir tout les champs";
    }
}






require $_dir["views"]."GestionAutorites.php";