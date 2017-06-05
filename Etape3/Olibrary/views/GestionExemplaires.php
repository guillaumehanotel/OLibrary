<?php


    $titre = $resultat_notice['notice_titre'];
    $date = date ('Y', strtotime($resultat_notice['notice_date_parution']));
    $synopsis = $resultat_notice['notice_synopsis'];
    $auteur = $resultat_notice['auteur_prenom'].' '.$resultat_notice['auteur_nom'];
    $auteur_id = $resultat_notice['auteur_id'];


?>

<main id="gestionExemplaires"  class="content">



    <div class="container">

        <div class="row">
            <a href="<?= BASE_URL."/notices/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
            <h2 class="soustitre">GESTION DES EXEMPLAIRES</h2>
        </div>

        <div class="row" id="notice_edit">
            <div class="col s12 m10 offset-m1">
                <div class="card">
                    <div class="card-content ">
                        <i id="mode_edit"  class=" myblue small material-icons right btn-floating btn-large ">mode_edit</i>
                        <div class="row ">
                            <div class=" blue-text center">
                                <span id="notice_titre" class="card-title"><?= $titre ?></span>
                            </div>
                        </div>
                        <p id="notice_auteur" data-id="<?= $auteur_id ?>"><?= $auteur ?>
                            <span id="notice_date"><?= $date ?></span>
                        </p>
                    </div>
                    <div id="notice_synopsis" class="card-action">
                        <?=  $synopsis ?>
                    </div>
                </div>
            </div>
        </div>





        <div class="row center">
            <a href="<?= BASE_URL."/supprNotice"; ?>/?id=<?= $resultat_notice['notice_id'] ?>" class="red waves-effect waves-light btn" id="deleteNotice"> Supprimer la notice et tous les exemplaires associés</a>
        </div>


        <div class="divider"></div>




        <div class="row center">
            <a class="green waves-effect waves-light btn center-align" href="#modal_livre">Ajouter un exemplaire</a>
        </div>

        <!-- Modal Structure -->
        <div id="modal_livre" class="modal">
            <div class="modal-content">
                <h4>Ajouter un exemplaire</h4>
                <form action="" method="post">
                    <div class="row">
                        <div class="col m6 s12">
                            <input type="text" name="livre_ISBN" placeholder="ISBN">
                        </div>
                        <div class="col m6 s12">
                            <select name="editeur_id" id="select_editeur">
                                <option disabled selected >Editeur</option>
                                <?php
                                foreach($editeurs as $editeur){
                                        echo "<option placeholder='Editeur'>".$editeur['editeur_id']." - ".$editeur['editeur_nom']."</option>";
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col m6 s12">
                            <select name="collection_id" id="select_collection">
                                <option disabled selected>Collection</option>
                                <?php
                                foreach($collections as $collection){
                                    echo "<option placeholder='Collection'>".$collection['collection_id']." - ".$collection['collection_nom']."</option>";
                                 }
                                ?>
                            </select>
                        </div>

                        <div class="col m6 s12">
                            <select name="fournisseur_id">
                                <option disabled selected>Fournisseur</option>
                                <?php
                                foreach($fournisseurs as $fournisseur){
                                    echo "<option>".$fournisseur['fournisseur_id']." - ".$fournisseur['fournisseur_nom'];?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="green btn waves-effect waves-light blue modal-action modal-close" name="create_exemplaire">
                    </div>

                </form>
            </div>
        </div>








        <?php
        if($resultat_nb_exemplaire['cpt'] != 0){
            ?>


            <div class="row" id="show_exemplaire">
                <h3 class="center">Exemplaires associés à la notice :</h3>
                <table class="centered striped responsive-table">
                    <thead>
                    <tr>
                        <th data-field="isbn">ISBN</th>
                        <th data-field="editeur">Editeur</th>
                        <th data-field="collection">Collection</th>
                        <th data-field="fournisseur">Fournisseur</th>
                        <th data-field="modification">Modification</th>
                        <th data-field="suppression">Suppression</th>
                    </tr>
                    </thead>
                    <tbody id="bodyExemplaires">
                    <?php
                    foreach ($resultat_exemplaire as $value){?>

                        <tr class="link_exemplaires">
                            <td class="exemplaire_isbn"><?= $value['exemplaire_ISBN']?></td>
                            <td id="exemplaire_<?= $value['exemplaire_id'] ?>_editeur" class="exemplaire_editeur" data-id="<?= $value['editeur_id']?>"><?= $value['editeur_nom']?></td>
                            <td id="exemplaire_<?= $value['exemplaire_id'] ?>_collection" class="exemplaire_collection" data-id="<?= $value['collection_id']?>"><?= $value['collection_nom']?></td>
                            <td id="exemplaire_<?= $value['exemplaire_id'] ?>_fournisseur" class="exemplaire_fournisseur" data-id="<?= $value['fournisseur_id']?>"><?= $value['fournisseur_nom']?></td>
                            <td class="exemplaire_edition"><i id="mode_edit_exemplaire_<?= $value['exemplaire_id'] ?>" class="mode_edit_exemplaire small material-icons">mode_edit</i></td>
                            <td class="exemplaire_suppression">
                                <a href="<?= BASE_URL."/supprExemplaire"; ?>/?id=<?= $value['exemplaire_id'] ?>&notice_id=<?= $value['notice_id'] ?>">
                                    <i class="small material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        <?php } ?>







    </div>
</main>

<script type="text/javascript">

    var TabAuteurs = <?php echo json_encode($auteurs); ?>;

    var TabFournisseurs = <?php echo json_encode($fournisseurs); ?>;
    var TabEditeurs = <?php echo json_encode($editeurs); ?>;
    var TabCollections = <?php echo json_encode($collections); ?>;
    var TabExemplaires = <?php echo json_encode($resultat_exemplaire); ?>;



</script>