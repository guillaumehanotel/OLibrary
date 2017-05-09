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
                        <?php foreach ($resultat_exemplaire as $res_exemplaire){ ?>
                        <tr>
                            <td><?= $res_exemplaire['exemplaire_ISBN']?></td>
                            <td><?= $res_exemplaire['editeur_nom'] ?></td>
                            <td><?= $res_exemplaire['collection_nom'] ?></td>
                            <td><?= $res_exemplaire['fournisseur_nom'] ?></td>
                            <td>
<?php
$exemplaire_id=$res_exemplaire['exemplaire_id'];

    $requeteemprunt="SELECT * FROM emprunte WHERE exemplaire_id=$exemplaire_id";
$reponse_emprunt = $bdd->query($requeteemprunt);
$resultat_emprunt = $reponse_emprunt->fetch();
                                    $reservation = $resultat_emprunt['is_reservation'];
                                    $bouton;
                                    if($reservation==1){
                                        //Si le livre est réservé
                                        $bouton="RESERVER";
                                    }
                                    elseif ($reservation==0){
                                        $bouton="EMPRUNTER";
                                    } ?>
                            <a href=""><?= $bouton ?></a> </td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>




                </div>
            </div>


        </div>
    </div>


</main>