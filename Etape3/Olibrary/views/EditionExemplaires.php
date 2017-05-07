<?php

$editeurs = json_decode($_POST['editeurs'], true);
$collections = json_decode($_POST['collections'], true);
$fournisseurs = json_decode($_POST['fournisseurs'], true);
$exemplaires = json_decode($_POST['exemplaires'], true);

$id_number = $_POST['id_number'];


?>








        <tbody id="bodyExemplaires">


        <?php

        foreach ($exemplaires as $value){

            if($id_number != $value['exemplaire_id']) {
                ?>



                        <tr class="link_exemplaires">

                            <td class="exemplaire_isbn"><?= $value['exemplaire_ISBN']?></td>
                            <td class="exemplaire_editeur"><?= $value['editeur_nom']?></td>
                            <td class="exemplaire_collection"><?= $value['collection_nom']?></td>
                            <td class="exemplaire_suppression"><?= $value['fournisseur_nom']?></td>
                            <td class="exemplaire_fournisseur"><i class=" grey-text small material-icons">mode_edit</i></td>
                            <td class="exemplaire_edition"><i class=" grey-text small material-icons">delete</i></td>
                        </tr>





                <?php
            }else {
                ?>


                        <tr class="link_exemplaires">

                            <form action="">

                                <td class="exemplaire_isbn">
                                    <input type="text" value="<?= $value['exemplaire_ISBN']?>" class="validate" id="isbn" name="isbn">
                                </td>


                                <td class="exemplaire_editeur"><?= $value['editeur_nom']?></td>


                                <td class="exemplaire_collection"><?= $value['collection_nom']?></td>


                                <td class="exemplaire_fournisseur"><?= $value['fournisseur_nom']?></td>

                                <td class="exemplaire_edition">
                                    <label for="submit_exemplaire">
                                        <i id="check_exemplaire" class="black-text fa fa-check fa-3x" aria-hidden="true"></i>
                                    </label>
                                </td>
                                <input type="submit" value="go" id="submit_exemplaire" hidden>

                            </form>

                            <td class="exemplaire_suppression"><i id="cancel_edit_exemplaire" class=" black-text fa fa-times fa-3x" aria-hidden="true"></i></a></td>


                        </tr>






                <?php
            }
        }
        ?>

        </tbody>
