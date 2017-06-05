<?php


if(!isset($_SESSION["connect"])){

    $_SESSION["erreur"]="Vous devez vous connecter pour accéder a cette page ";

    //$token_error = true;
    header('Location: '.BASE_URL.'/connexion/');
}

    $requete_utilisateur =
        "SELECT user_num, user_nom, user_prenom, user_mail, is_admin 
        FROM utilisateur";

    $reponse_utilisateur = $bdd->query($requete_utilisateur);
    $resultat_utilisateur = $reponse_utilisateur->fetchAll();


    if(!empty($_POST['edit_utilisateur'])){

        if(    !empty($_POST['user_id']) && isset($_POST['user_id'])
            && !empty($_POST['user_nom']) && isset($_POST['user_nom'])
            && !empty($_POST['user_prenom']) && isset($_POST['user_prenom'])
            && !empty($_POST['user_mail']) && isset($_POST['user_mail'])
            && !empty($_POST['user_admin']) && isset($_POST['user_admin'])){


            if(!empty($_POST['user_mdp']) && isset($_POST['user_mdp'])){

                $requete = $bdd -> prepare("UPDATE utilisateur SET 
                                                    user_nom = :user_nom, 
                                                    user_prenom = :user_prenom, 
                                                    user_mail = :user_mail, 
                                                    user_mdp = :user_mdp, 
                                                    is_admin = :is_admin 
                                                    WHERE user_num = :user_id");

                $param = array(
                    'user_nom' => securify($_POST['user_nom']),
                    'user_prenom' => securify($_POST['user_prenom']),
                    'user_mail' => securify($_POST['user_mail']),
                    'user_mdp' => password_hash($_POST['user_mdp'], PASSWORD_DEFAULT),
                    'is_admin' => securify($_POST['user_admin']=='on' ? TRUE : FALSE),
                    'user_id' => securify(explode(" ", $_POST['user_id'])[0])
                );

                var_dump($requete);
                var_dump($param);

            }

            else{
                $requete = $bdd -> prepare("UPDATE utilisateur SET user_nom=:user_nom, user_prenom=:user_prenom, 
                                                    user_mail=:user_mail, is_admin=:is_admin WHERE user_num=:user_id");

                $param = array(
                    'user_nom' => securify($_POST['user_nom']),
                    'user_prenom' => securify($_POST['user_prenom']),
                    'user_mail' => securify($_POST['user_mail']),
                    'is_admin' => securify($_POST['user_admin']),
                    'user_id' => securify(explode(" ", $_POST['user_id'])[0])
                );
            }
            $requete->execute($param);

        }



    }

require $_dir["views"]."GestionUtilisateurs.php";

