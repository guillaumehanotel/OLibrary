<main id="gestionAutorites" class="content container">

    <div class="row">
        <a href="<?= BASE_URL."/menugestion/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="soustitre">GESTION DES AUTORITES</h2>
    </div>



        <h3>AUTEURS</h3>


    <!-- Modal Trigger -->
    <a class="green waves-effect waves-light btn" href="#modal_auteur">Ajouter un auteur</a>

    <!-- Modal Structure -->
    <div id="modal_auteur" class="modal">
        <div class="modal-content">
            <h4>Ajouter un auteur</h4>
            <form class="col s12" action="" method="post">

                <div class="row center">
                    <div class="input col l5 s12">
                        <input type="text" name="auteur_nom" placeholder="Nom">
                    </div>
                    <div class="input col l5 s12">
                        <input type="text" name="auteur_prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="auteur" value="VALIDER">
                </div>
            </form>
        </div>
    </div>

    <table class="centered striped responsive-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>

            <th>Modification</th>
            <th>Suppression</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_auteur as $req_auteur){ ?>
            <tr>
                <td><?= $req_auteur['auteur_nom']?></td>
                <td><?= $req_auteur['auteur_prenom']?></td>

                <td >
                    <a class="link_edit_auteur modal-trigger" href="#modal_edit_auteur"
                       data-auteur_id="<?= $req_auteur['auteur_id']?>"
                       data-auteur_nom="<?= $req_auteur['auteur_nom']?>"
                       data-auteur_prenom="<?= $req_auteur['auteur_prenom']?>"
                    >
                        <i  class="material-icons">mode_edit</i>
                    </a>
                </td>
                <td><a href="<?= BASE_URL."/SupprimerAuteur"; ?>/?id=<?= $req_auteur['auteur_id'] ?>"><i class="material-icons">delete</i></a></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>





    <h3>Ajouter un editeur :</h3>

    <!-- Modal Structure -->
    <div id="modal_edit_auteur" class="modal modal-fixed-footer">

        <div class="modal-content">
            <h4>Modification Auteur</h4>


            <div class="row">
                <form class="col s12" action="" method="post">

                    <input type="text" id="auteur_id" name="auteur_id" hidden>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" name="auteur_prenom" class="validate">
                            <label  class="active" for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" name="auteur_nom" class="validate">
                            <label class="active" for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Modifier" class="btn waves-effect waves-light blue" name="edit_auteur">
                    </div>
                </form>
            </div>
        </div>

        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Annuler</a>
        </div>


    </div>





    <div class="divider"></div>



    <h3>EDITEURS</h3>


    <a class="green waves-effect waves-light btn" href="#modal_editeur">Ajouter un éditeur</a>


    <!-- Modal Structure -->
    <div id="modal_editeur" class="modal">

        <div class="modal-content">
            <h4>Ajouter un éditeur</h4>

            <form action="" method="post">
                <div class="row center">
                    <div class="input col l10 s12">
                        <input type="text" name="editeur_nom" placeholder="Nom de l'éditeur">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="editeur">
                </div>
            </form>
        </div>
    </div>



    <table class="centered striped  responsive-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_editeur as $req_editeur){ ?>
            <tr>
                <td><?= $req_editeur['editeur_nom']?></td>
                <td><a class="link_edit_editeur modal-trigger" href="#modal_edit_editeur"
                       data-editeur_id="<?= $req_editeur['editeur_id']?>"
                       data-editeur_nom="<?= $req_editeur['editeur_nom']?>"
                    >
                        <i  class="material-icons">mode_edit</i>
                    </a></td>
                <td><a href="<?= BASE_URL."/SupprimerEditeur"; ?>/?id=<?= $req_editeur['editeur_id'] ?>"><i class="material-icons">delete</i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <!-- Modal Structure -->
    <div id="modal_edit_editeur" class="modal modal-fixed-footer">

        <div class="modal-content">
            <h4>Modification Editeur</h4>


            <div class="row">
                <form class="col s12" action="" method="post">

                    <input type="text" id="editeur_id" name="editeur_id" hidden>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="editeur_nom" type="text" name="editeur_nom" class="validate">
                            <label class="active" for="editeur_nom">Nom</label>
                        </div>
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Modifier" class="btn waves-effect waves-light blue" name="edit_editeur">
                    </div>
                </form>
            </div>
        </div>

        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Annuler</a>
        </div>


    </div>





    <div class="divider"></div>








    <h3>FOURNISSEURS</h3>


    <a class="green waves-effect waves-light btn" href="#modal_fournisseur">Ajouter un fournisseur</a>

    <!-- Modal Structure -->
    <div id="modal_fournisseur" class="modal">

        <div class="modal-content">
            <h4>Ajouter un fournisseur</h4>
            <form action="" method="post">
                <div class="row center">
                    <div class="input col l10 s12">
                        <input type="text" name="fournisseur_nom" placeholder="Nom du fournisseur">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="fournisseur">
                </div>
            </form>
        </div>
    </div>


    <table class="centered striped  responsive-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_fournisseur as $req_fournisseur){ ?>
            <tr>
                <td><?= $req_fournisseur['fournisseur_nom']?></td>
                <td><a class="link_edit_fournisseur modal-trigger" href="#modal_edit_fournisseur"
                       data-fournisseur_id="<?= $req_fournisseur['fournisseur_id']?>"
                       data-fournisseur_nom="<?= $req_fournisseur['fournisseur_nom']?>"
                    >
                        <i  class="material-icons">mode_edit</i>
                    </a></td>
                <td><a href="<?= BASE_URL."/SupprimerFournisseur"; ?>/?id=<?= $req_fournisseur['fournisseur_id'] ?>"><i class="material-icons">delete</i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>



    <!-- Modal Structure -->
    <div id="modal_edit_fournisseur" class="modal modal-fixed-footer">

        <div class="modal-content">
            <h4>Modification Fournisseur</h4>


            <div class="row">
                <form class="col s12" action="" method="post">

                    <input type="text" id="fournisseur_id" name="fournisseur_id" hidden>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="fournisseur_nom" type="text" name="fournisseur_nom" class="validate">
                            <label class="active" for="fournisseur_nom">Nom</label>
                        </div>
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Modifier" class="btn waves-effect waves-light blue" name="edit_fournisseur">
                    </div>
                </form>
            </div>
        </div>

        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Annuler</a>
        </div>


    </div>










    <div class="divider"></div>






    <h3>COLLECTIONS</h3>


    <a class="green waves-effect waves-light btn" href="#modal_collection">Ajouter une collection</a>

    <!-- Modal Structure -->
    <div id="modal_collection" class="modal">

        <div class="modal-content">
            <h4>Ajouter une collection</h4>

            <form class="col s12" action="" method="post">
                <div class="row center">
                    <div class="input col l5 s12">
                        <input type="text" name="collection_nom" placeholder="Nom de la collection">
                    </div>
                    <div class="col l5 s12>">
                        <select name="editeur_id">
                            <option disabled selected>Editeur id </option>
                            <?php
                            foreach($requete_editeur as $edit_id){
                                echo "<option>".$edit_id['editeur_id']." - ".$edit_id['editeur_nom']."</option>"; ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn waves-effect waves-light blue modal-action modal-close" name="collection">
                </div>
            </form>

        </div>
    </div>



    <table class="centered striped responsive-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Nom de l'éditeur</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($requete_collection as $req_collection){ ?>
            <tr>
                <td><?= $req_collection['collection_nom']?></td>
                <td><?= $req_collection['editeur_nom']?></td>
                <td><a class="link_edit_collection modal-trigger" href="#modal_edit_collection"
                       data-collection_id="<?= $req_collection['collection_id']?>"
                       data-collection_nom="<?= $req_collection['collection_nom']?>"
                       data-editeur_id="<?= $req_collection['editeur_id']?>"
                    >
                        <i  class="material-icons">mode_edit</i>
                    </a></td>
                <td><a href="<?= BASE_URL."/SupprimerCollection"; ?>/?id=<?= $req_collection['collection_id'] ?>"><i class="material-icons">delete</i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <!-- Modal Structure -->
    <div id="modal_edit_collection" class="modal modal-fixed-footer">

        <div class="modal-content">
            <h4>Modification Collection</h4>

            <div class="row">


                <form class="col s12" action="" method="post">

                    <input type="text" id="collection_id" name="collection_id" hidden>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="collection_nom" type="text" name="collection_nom" class="validate">
                            <label class="active" for="collection_nom">Nom</label>
                        </div>

                        <div class="input-field col s6>">
                            <select name="editeur_id" id="select_editeur">
                                <option disabled selected>Editeur</option>
                                <?php
                                foreach($requete_editeur as $edit_id){
                                    echo "<option value='".$edit_id['editeur_id']."'>".$edit_id['editeur_id']." - ".$edit_id['editeur_nom']."</option>"; ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="input_field">
                        <input type="submit" value="Modifier" class="btn waves-effect waves-light blue" name="edit_collection">
                    </div>
                </form>





            </div>
        </div>

        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Annuler</a>
        </div>


    </div>








    <div class="divider"></div>









</main>

<script>
    $(document).ready(function() {
        $('select').material_select();
        $('.modal').modal();

    });
</script>