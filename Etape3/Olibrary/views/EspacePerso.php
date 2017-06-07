<main id="espacePerso" class="content container">

    <h2 class="soustitre">Espace Perso</h2>

    <?php foreach ($requete_user as $req_user){
        ?>
        <strong>Nom : </strong><?= $req_user['user_nom'];?><br>
        <strong>Prénom : </strong><?= $req_user['user_prenom'];?><br>
        <strong>Adresse de messagerie : </strong><?= $req_user['user_mail'];?><br/>

        <div class="divider"></div>

        <div class="row center">
            <a class="blue waves-effect waves-light btn" href="#modal1">Modifier les informations</a>
        </div>


        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Modification des informations</h4>
                <form class="col s12" action="" method="post">
                    <div class="row center">
                        <div class="input-field col l5 s12">
                            <input id="user_nom" type="text" name="user_nom" class="validate" value="<?= $req_user['user_nom']?>">
                            <label for="user_nom">Nom</label>
                        </div>

                        <div class="input-field col l5 s12">
                            <input id="user_prenom" type="text" name="user_prenom" class="validate" value="<?= $req_user['user_prenom']?>">
                            <label for="user_prenom">Prénom</label>
                        </div>

                        <input type="hidden" name="user_num" value="<?= $_SESSION['user_num']?>">


                        <div class="input-field col l5 s12">
                            <input id="user_mail" type="email" name="user_mail" class="validate" value="<?= $req_user['user_mail']?>">
                            <label for="user_mail">Adresse mail</label>
                        </div>

                        <div class="input-field col l5 s12">
                            <input id="user_mdp" type="password" name="user_mdp" class="validate">
                            <label for="user_mdp">Mot de passe</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="utilisateur" value="VALIDER">
                    </div>
                </form>
            </div>
        </div>


        <div class="row center">
            <a class="red waves-effect waves-light btn" href="#modal2">Supprimer le compte</a>
        </div>
        <!-- Modal Structure -->
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4>Supprimer le compte</h4>
                <form class="col s12" action="" method="post">
                    <div class="row center">

                        <p>La suppression de votre compte entrainera, la perte de toutes vos données dont l'annulation de vos reservations, et implique que chaque ouvrage emprunté vont être rendus.<br>
                            Merci de votre compréhension</p>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="suppr" value="Supprimer le compte">
                    </div>
                </form>
            </div>
        </div>
        <?php
    } ?>


    <div class="divider"></div>

    <?php
    if(!empty($requete_emprunt)){ ?>
        <h4>Livres empruntés :</h4>


        <table class="highlight">
            <thead>
            <tr>
                <th>Titre du livre</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>

            <?php
            foreach ($requete_emprunt as $req_emprunt){?>
                <tr>
                    <td><?=$req_emprunt['notice_titre'];?></td>
                    <td><?=$req_emprunt['emprunt_date'];?></td>
                    <td><?=$req_emprunt['emprunt_retour'];?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="exemplaire_id" value="<?= $req_emprunt['exemplaire_id']?>">
                            <input type="submit" name="rendre" value="Rendre">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php }

    if(!empty($requete_resa)) {?>


        <h4>Livres réservés :</h4>


        <table class="highlight centered striped responsive-table"">
            <thead>
            <tr>
                <th>Titre du livre</th>
                <th>Date de réservation</th>
                <th>Date de disponibilité</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>

            <?php foreach ($requete_resa as $req_resa){?>
                <tr>
                    <td><?=$req_resa['notice_titre'];?></td>
                    <td><?=$req_resa['emprunt_date'];?></td>
                    <td><?=$req_resa['emprunt_retour'];?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="exemplaire_id" value="<?= $req_resa['exemplaire_id']?>">
                            <input type="submit" class="red btn" name="annuler" value="Annuler">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>




</main>
<script>
    $(document).ready(function() {
        $('select').material_select();
        $('.modal').modal();
    });
</script>