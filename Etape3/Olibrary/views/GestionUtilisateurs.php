<main id="gestionUtilisateurs"  class="content container">


    <div class="row">

        <a href="<?= BASE_URL."/menugestion/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="soustitre">GESTION DES UTILISATEURS</h2>


    </div>


    <table class="centered striped">
        <thead>
        <tr>

            <th class="user_prename">Nom - Prénom</th>
            <th class="user_mail">mail</th>
            <th class="user_edit">Modifier</th>
            <th class="user_delete">Supprimer</th>
        </tr>
        </thead>
         <tr>
            <?php foreach ($resultat_utilisateur as $utilisateur)
            { ?>

               <td><?php if($utilisateur['is_admin']==true){
                    echo "<i id='admin' class='material-icons'>perm_identity</i>";
                } ?><?= $utilisateur['user_nom']; ?> <?= $utilisateur['user_prenom']; ?></td>
            <td> <?= $utilisateur['user_mail']; ?> </td>

            <td>  <a class="link_edit_user modal-trigger" href="#modal_edit_user"
                     data-user_id="<?= $utilisateur['user_num']?>"
                     data-user_nom="<?= $utilisateur['user_nom']?>"
                     data-user_prenom="<?= $utilisateur['user_prenom']?>"
                     data-user_mail="<?= $utilisateur['user_mail']?>"
                     data-user_admin="<?= $utilisateur['is_admin']?>"

                >
                    <i  class="material-icons">mode_edit</i>
                </a></td>
            <td>  <a href="<?= BASE_URL."/supprUser";?>/?id=<?= $utilisateur['user_num']?>"> <i class='material-icons'>delete</i></a> </td>
        </tr>
        <?php
        } 
     ?>
    </table>

    <!-- Modal Structure -->
    <div id="modal_edit_user" class="modal modal-fixed-footer">

        <div class="modal-content">
            <h4>Modification Utilisateur</h4>


            <div class="row">
                <form class="col s12" action="" method="post">

                    <input type="text" id="user_id" name="user_id" hidden>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="user_nom" type="text" name="user_nom" class="validate">
                            <label class="active" for="user_nom">Nom</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="user_prenom" type="text" name="user_prenom" class="validate">
                            <label class="active" for="user_prenom">Prénom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="user_mail" type="email" name="user_mail" class="validate">
                            <label class="active" for="user_mail">Adresse Mail</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="user_mdp" type="password" name="user_mdp" class="validate">
                            <label class="active" for="user_mdp">Mot de passe</label>
                        </div>
                    </div>
                    <div class="switch">
                        <label>
                            Non admin
                            <input id="user_admin" name="user_admin" type="checkbox">
                            <span class="lever"></span>
                            Admin
                        </label>
                    </div>


                    <div class="input_field">
                        <input type="submit" value="Modifier" class="btn waves-effect waves-light blue" name="edit_utilisateur">
                    </div>
                </form>
            </div>
        </div>

</main>