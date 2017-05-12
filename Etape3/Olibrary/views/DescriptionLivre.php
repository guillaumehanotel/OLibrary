<?php


$titre = $description_livre['notice_titre'];
$date = date ('Y', strtotime($description_livre['notice_date_parution']));
$synopsis = $description_livre['notice_synopsis'];
$auteur = $resultat_notice['auteur_prenom'].' '.$resultat_notice['auteur_nom'];
$auteur_id = $resultat_notice['auteur_id'];


?>


<main id="descriptionLivre"  class="content">


    <div class="container">

        <div class="row">


            <div class="col s12 m10 offset-m1">
                <div class="card">
                    <div class="card-content black-text">

                        <h5 class="center">NOTICE</h5>
                        <span id="notice_titre" class="card-title"><?= $titre ?></span>
                        <p id="notice_auteur" data-id="<?= $auteur_id ?>"><?= $auteur ?></p>
                        <p id="notice_date"><?= $date ?></p>
                    </div>

                    <div id="notice_synopsis" class="card-action black-text">
                        <?=  $synopsis ?>
                    </div>


                    <table>
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Editeur</th>
                            <th>Collection</th>
                            <th>Fournisseur</th>
                            <th>Reserver/Emprunter</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($resultat_exemplaire as $res_exemplaire) { ?>
                            <tr>
                                <td><?= $res_exemplaire['exemplaire_ISBN'] ?></td>
                                <td><?= $res_exemplaire['editeur_nom'] ?></td>
                                <td><?= $res_exemplaire['collection_nom'] ?></td>
                                <td><?= $res_exemplaire['fournisseur_nom'] ?></td>
                                <td>
                                    <?php
                                    $exemplaire_id = $res_exemplaire['exemplaire_id'];

                                    $requeteemprunt = "SELECT * FROM emprunte WHERE exemplaire_id=$exemplaire_id";
                                    $reponse_emprunt = $bdd->query($requeteemprunt);
                                    $resultat_emprunt = $reponse_emprunt->fetch();

                                    $reservation = $resultat_emprunt['is_reservation'];

                                    if ($reservation == 1) {
                                        //Si le livre est réservé
                                        $bouton = "RESERVER";
                                    } elseif ($reservation == NULL){
                                        $bouton = "EMPRUNTER";
                                    } elseif ($reservation == 0) {
                                        $bouton = "RESERVER";
                                    } ?>

                                    <a class="waves-effect waves-light btn" href="#<?= $bouton ?>/?idex=<?=$res_exemplaire['exemplaire_id']?>"><?= $bouton ?></a>
                                </td>
                            </tr>


                            <?php
                            if (empty($_SESSION)) { ?>
                                <div id="<?= $bouton ?>/?idex=<?=$res_exemplaire['exemplaire_id']?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Se connecter</h4>
                                        <p>Pour acceder a la réservation ou l'emprunt d'un exemplaire, merci de vous
                                            connecter</p>
                                        <a href="<?= BASE_URL . "/connexion/" ?>" class="waves-effect waves-green btn-flat">Connexion</a>
                                        <a href="<?= BASE_URL . "/inscription/" ?>" class="waves-effect waves-green btn-flat">Inscription</a>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!"
                                           class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
                                    </div>
                                </div>

                            <?php } else {
                                if ($bouton == "EMPRUNTER") {
                                    ?>
                                    <div id="<?= $bouton ?>/?idex=<?=$res_exemplaire['exemplaire_id']?>" class="modal">

                                        <div class="modal-content row">
                                            <h4>EMPRUNTER</h4>
                                            <p>L'emprunt d'un exemplaire signifie que ce dernier devra être rendu à la
                                                date définie par vous même</p>
                                            <form method="post">
                                                <h5>Date de rendu : </h5>
                                                <div class="input-field col s6">
                                                    <input type="date" class="validate" name="date">
                                                </div>

                                                    <input type="hidden" name="exemplaireid" class="validate" value="<?= $res_exemplaire['exemplaire_id'] ?>">

                                                <div class="input-field col s6">
                                                    <input type="submit" value="Emprunter" name="valideremprunt">
                                                </div>

                                            </form>

                                        </div>

                                        <div class="modal-footer">
                                            <a href=""
                                               class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                                        </div>

                                    </div>
                                <?php } elseif ($bouton == "RESERVER") { ?>

                                    <div id="<?= $bouton ?>" class="modal">
                                        <div class="modal-content">
                                            <h4>RESERVER</h4>
                                            <p>A bunch of text</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!"
                                               class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                                        </div>
                                    </div>

                                    <?php
                                }

                            }
                        }?>

                        </tbody>
                    </table>




                </div>
            </div>


        </div>
    </div>

    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>
</main>

