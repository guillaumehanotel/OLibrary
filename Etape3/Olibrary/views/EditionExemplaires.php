<?php

$editeurs = json_decode($_POST['editeurs'], true);
$collections = json_decode($_POST['collections'], true);

$fournisseurs = json_decode($_POST['fournisseurs'], true);

$exemplaires = json_decode($_POST['exemplaires'], true);

$id_number = $_POST['id_number'];
$exemplaire_editeur_id = $_POST['exemplaire_editeur_id'];
$exemplaire_fournisseur_id = $_POST['exemplaire_fournisseur_id'];
$exemplaire_collection_id = $_POST['exemplaire_collection_id'];





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


                <td class="exemplaire_editeur">
                    <select name="editeur_id" id="select_editeur">
                        <option disabled >Editeur</option>
                        <?php
                        foreach($editeurs as $editeur){
                            if($editeur['editeur_id'] == $exemplaire_editeur_id){
                                echo "<option selected>".$editeur['editeur_id']." - ".$editeur['editeur_nom']."</option>";
                            } else {
                                echo "<option>".$editeur['editeur_id']." - ".$editeur['editeur_nom']."</option>";
                            }
                        } ?>
                    </select>
                </td>



                <td class="exemplaire_collection">
                    <select name="collection_id" id="select_collection">
                        <option disabled >Collection</option>
                        <?php
                        foreach($collections as $collection){
                            if($collection['collection_id'] == $exemplaire_collection_id){
                                echo "<option value='".$collection['collection_id']."' selected>".$collection['collection_id']." - ".$collection['collection_nom']."</option>";
                            } else {
                                echo "<option value='".$collection['collection_id']."' >".$collection['collection_id']." - ".$collection['collection_nom']."</option>";
                            }
                        } ?>
                    </select>
                </td>


                <td class="exemplaire_fournisseur">
                    <select name="fournisseur_id" id="select_fournisseur">
                        <option disabled >Fournisseur</option>
                        <?php
                        foreach($fournisseurs as $fournisseur){
                            if($fournisseur['fournisseur_id'] == $exemplaire_fournisseur_id){
                                echo "<option selected>".$fournisseur['fournisseur_id']." - ".$fournisseur['fournisseur_nom']."</option>";
                            } else {
                                echo "<option>".$fournisseur['fournisseur_id']." - ".$fournisseur['fournisseur_nom']."</option>";
                            }
                        } ?>
                    </select>
                </td>

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


<script>

    $(document).ready(function() {
        $('select').material_select();
    });


</script>