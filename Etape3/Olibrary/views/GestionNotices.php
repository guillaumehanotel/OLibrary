<main id="gestionNotices"  class="content">

    <h2 class="soustitre">Gestion des notices et des exemplaires</h2>

    <div class="container">

        <h3>Notices :</h3>


        <a class="waves-effect waves-light btn" href="#modal_livre">Ajouter une notice</a>

        <!-- Modal Structure -->
        <div id="modal_livre" class="modal">


            <div class="modal-content">

                <h4>Ajouter une notice</h4>
                <div class="row">
                <form action="" method="post">

                    <div class="row">


                        <div class=" input-field col m9 s10">
                            <input type="text" id="livre_titre" name="livre_titre"  class="validate">
                            <label for="livre_titre">Titre</label>
                        </div>

                    </div>

                    <div class="row">

                        <div class="input-field col m6 s10">
                            <input type="date" name="date" id="livre_date" class="validate">

                        </div>

                        <div class="col m6 s10">

                            <select class="input-field" name="livre_auteur">

                                <option disabled selected>Auteur</option>
                                <?php
                                foreach($resultat_auteur as $auteur){
                                    echo "<option>".$auteur['auteur_id']." - ".$auteur['auteur_prenom']." ".$auteur['auteur_nom'];?> </option>
                                <?php }
                                ?>
                            </select>

                        </div>

                    </div>



                    <div class="row">
                        <div class=" input-field col s10 s12">
                            <textarea name="synopsis" id="textarea_synopsis"  class="materialize-textarea"></textarea>
                            <label for=textarea_synopsis">Synopsis</label>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="submit_notice">
                    </div>

                </form>
            </div>
            </div>
        </div>







        <table class="centered striped">
            <thead>
            <tr>
                <th data-field="titre"><a id="titre" href="#" class="asc">Titre</a></th>
                <th data-field="auteur"><a id="auteur" href="#" class="asc">Auteur</a></th>
                <th data-field="nb">Nombre d'exemplaires</th>
                <!--<th data-field="showExempl">Voir les exemplaires</th>-->
            </tr>
            </thead>
            <tbody id="bodyLivres">




            <?php
            foreach ($resultat_livre as $value){?>

                    <tr class="selectable link_exemplaires" id="row_<?= $value['notice_id'] ?>">

                        <td class="notice_titre"><?= $value['notice_titre'];?></td>
                        <td class="auteur_name"><?= $value['auteur_prenom'];?> <?=$value['auteur_nom'];?></td>
                        <td class="cpt"><?= $value['cpt'];?></td>
                        <!--<td class="link"> <a href='<?//= BASE_URL."/exemplaires"; ?>/?id=<?//= $value['notice_id'] ?>'><i class="small material-icons">visibility</i></a></td>-->
                    </tr>


                <?php
            }
            ?>

            </tbody>
        </table>

        <br>

        <script type="text/javascript">
            var $base_url = <?php echo json_encode(BASE_URL); ?>;
        </script>

</div>
</main>