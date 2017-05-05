<?php


    $titre = $resultat_notice['notice_titre'];
    $date = date ('Y', strtotime($resultat_notice['notice_date_parution']));
    $synopsis = $resultat_notice['notice_synopsis'];
    $auteur = $resultat_notice['auteur_prenom'].' '.$resultat_notice['auteur_nom'];
    $auteur_id = $resultat_notice['auteur_id'];


?>

<main id="gestionExemplaires"  class="content">

    <!-- <h2 class="soustitre">Gestion des exemplaires</h2> -->
    <h2 class="soustitre">GESTION DES EXEMPLAIRES</h2>

    <div class="container">

        <div class="row" id="notice_edit">


            <div class="col s12 m10 offset-m1">
                <div class="card">
                    <div class="card-content white-text">

                        <i id="mode_edit"  class="small material-icons right">mode_edit</i>

                        <h5 class="center">NOTICE</h5>
                        <span id="notice_titre" class="card-title"><?= $titre ?></span>
                        <p id="notice_auteur" data-id="<?= $auteur_id ?>"><?= $auteur ?></p>
                        <p id="notice_date"><?= $date ?></p>
                    </div>

                    <div id="notice_synopsis" class="card-action white-text">
                        <?=  $synopsis ?>
                    </div>

                </div>
            </div>


        </div>


        <div class="row" id="show_exemplaire">

            <h3>Exemplaires associés à la notice :</h3>

            <table class="centered striped">
                <thead>
                <tr>
                    <!--
                    <th data-field="id">ID</th>
                    <th data-field="titre">Titre</th>
                    -->
                    <th data-field="isbn">ISBN</th>
                    <th data-field="editeur">Editeur</th>
                    <th data-field="collection">Collection</th>
                    <th data-field="fournisseur">Fournisseur</th>
                    <th data-field="edition">Edition</th>
                    <th data-field="suppression">Suppression</th>
                </tr>
                </thead>
                <tbody id="bodyExemplaires">


                <?php
                foreach ($resultat_exemplaire as $value){?>

                    <tr class="link_exemplaires">

                        <!--
                        <td class="exemplaire_id"><?//= $value['exemplaire_id'];?></td>
                        <td class="exemplaire_titre"><?//= $value['notice_titre']?> </td>
                        -->
                        <td class="exemplaire_isbn"><?= $value['exemplaire_ISBN']?></td>
                        <td class="exemplaire_editeur"><?= $value['editeur_nom']?></td>
                        <td class="exemplaire_collection"><?= $value['collection_nom']?></td>
                        <td class="exemplaire_fournisseur"><?= $value['fournisseur_nom']?></td>
                        <td class="exemplaire_edition">Edition</td>
                        <td class="exemplaire_suppression">X</td>
                    </tr>


                    <?php
                }
                ?>

                </tbody>
            </table>

        </div>


    </div>
</main>

<script type="text/javascript">

    var TabAuteurs = <?php echo json_encode($auteurs); ?>;

</script>