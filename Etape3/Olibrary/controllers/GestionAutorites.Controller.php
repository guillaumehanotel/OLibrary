<?php


// Enregistrer l'auteur
if(!empty($_POST["auteur"])){
    if(!empty($_POST["auteur_nom"]) && !empty($_POST["auteur_prenom"]) &&
        isset($_POST["auteur_nom"]) && isset($_POST["auteur_prenom"])){
        $auteur_nom = $_POST["auteur_nom"];
        $auteur_prenom = $_POST["auteur_prenom"];

        $requete = "INSERT INTO auteur (auteur_nom, auteur_prenom)
               VALUES ('$auteur_nom','$auteur_prenom')";
        $bdd->query($requete);
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

// Enregistrer l'éditeur
if(!empty($_POST["editeur"])){
    if(!empty($_POST["editeur_nom"]) && isset($_POST["editeur_nom"])){
        $editeur_nom = $_POST["editeur_nom"];

        $requete = "INSERT INTO editeur (editeur_nom)
               VALUES ('$editeur_nom')";
        $bdd->query($requete);
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

//Enregistrer le fournisseur
if(!empty($_POST["fournisseur"])){
    if(!empty($_POST["fournisseur_nom"]) && isset($_POST["fournisseur_nom"])){
        $fournisseur_nom = $_POST["fournisseur_nom"];

        $requete = "INSERT INTO fournisseur (fournisseur_nom)
               VALUES ('$fournisseur_nom')";
        $bdd->query($requete);
    }
    else {
        echo "Merci de remplir tout les champs";
    }
}


$editid= $bdd->query("SELECT editeur_id FROM editeur");
$editeur_id=$editid->fetchAll();

$autid= $bdd->query("SELECT auteur_id FROM auteur");
$auteur_id=$autid->fetchAll();

$collid= $bdd->query("SELECT collection_id FROM collection ORDER BY collection_id");
$collection_id=$collid->fetchAll();

$fournid= $bdd->query("SELECT fournisseur_id FROM fournisseur");
$fournisseur_id=$fournid->fetchAll();


//Enregistrer la collection
if(!empty($_POST["collection"])) {

    if (!empty($_POST["collection_nom"]) && !empty($_POST["editeur_id"]) && isset($_POST["collection_nom"]) && isset($_POST["editeur_id"])) {
        $collection_nom = $_POST["collection_nom"];
        $editeur_id = $_POST["editeur_id"];


        $requete = "INSERT INTO collection (collection_nom, editeur_id)
               VALUES ('$collection_nom', '$editeur_id')";
        $bdd->query($requete);

    }
    else {
        echo "Merci de remplir tout les champs";
    }
}

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


        $requete = "INSERT INTO livre (livre_ISBN,livre_titre, nb_exemplaire, date_parution,synopsis,auteur_id,collection_id,fournisseur_id)
               VALUES ('$livre_ISBN','$livre_titre', '$nb_exemplaire', '$date','$synopsis','$auteur_id','$collection_id','$fournisseur_id')";
        $bdd->query($requete);

        var_dump($requete);

    }
    else {
        echo "Merci de remplir tout les champs";
    }
}






require $_dir["views"]."GestionAutorites.php";