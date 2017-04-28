<?php

if(isset($_SESSION['connect'])){

    $num = $_SESSION['user_num'];

    $requeteuser=$bdd->query("SELECT * FROM utilisateur WHERE user_num = '$num'");
    $requete_user = $requeteuser->fetchAll();

    if(!empty($_POST['utilisateur'])){

        $user_nom = $_POST['user_nom'];
        $user_prenom = $_POST['user_prenom'];
        $user_mail = $_POST['user_mail'];
        $user_mdp = password_hash($_POST['user_mdp'], PASSWORD_DEFAULT);
        $user_num = $_POST['user_num'];

        $requete = "UPDATE utilisateur SET user_nom = '$user_nom', user_prenom = '$user_prenom', user_mail = '$user_mail', user_mdp = '$user_mdp' WHERE user_num ='$user_num'";
        $bdd->query($requete);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $requeteemprunt=$bdd->query("SELECT * FROM emprunte em JOIN exemplaire ex ON em.exemplaire_id=ex.exemplaire_id JOIN notice n 
    ON ex.exemplaire_notice_id = n.notice_id WHERE em.user_num = '$num' AND em.is_reservation='0' ");
    $requete_emprunt = $requeteemprunt->fetchAll();

    if(!empty($_POST['rendre'])){

        $exemplaire_id = $_POST['exemplaire_id'];
        $requete = "DELETE FROM emprunte WHERE user_num ='$num' AND exemplaire_id='$exemplaire_id'";
        $bdd->query($requete);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }




    $requeteresa=$bdd->query("SELECT * FROM emprunte em JOIN exemplaire ex ON em.exemplaire_id=ex.exemplaire_id JOIN notice n 
    ON ex.exemplaire_notice_id = n.notice_id WHERE em.user_num = '$num' AND em.is_reservation='1' ");
    $requete_resa = $requeteresa->fetchAll();

    if(!empty($_POST['annuler'])){

        $exemplaire_id = $_POST['exemplaire_id'];
        $requete = "DELETE FROM emprunte WHERE user_num ='$num' AND exemplaire_id='$exemplaire_id'";
        $bdd->query($requete);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if(!empty($_POST['suppr'])){

        $requete = "DELETE FROM emprunte WHERE user_num ='$num'";
        $bdd->query($requete);
        $requete2 = "DELETE FROM utilisateur WHERE user_num ='$num'";
        $bdd->query($requete2);
        header('Location: http://localhost/projetolibrary/OLibrary/Etape3/Olibrary/deconnexion/');

    }




    require $_dir["views"]."EspacePerso.php";
}
else{
    header('Location:'.BASE_URL.'/connexion/');
}


