<main id="gestionAutorites" class="content container">
    <h2 class="soustitre">Gestion des autorités</h2>
    
    
    
    <h3>Ajouter un auteur :</h3>

    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn" href="#modal1">Ajouter un auteur</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <form class="col s12" action="/projetolibrary/OLibrary/Etape3/Olibrary/autorites/" method="post">
                <div class="row center"><div class="input col l5 s12"><input ctype="text" name="auteur_nom" placeholder="Nom"></div>
                    <div class="input col l5 s12"><input type="text" name="auteur_prenom" placeholder="Prénom"></div>

        </div>
        <div class="modal-footer">
            <input type="submit" class="btn waves-effect waves-light bluemodal-action modal-close" name="auteur" value="VALIDER">
        </div>
            </form>
        </div>
    </div>



    <table class="centered responsive-table highlight">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_auteur as $req_auteur){ ?>
        <tr>
            <td><?= $req_auteur['auteur_id']?></td>
            <td><?= $req_auteur['auteur_nom']?></td>
            <td><?= $req_auteur['auteur_prenom']?></td>
        </tr> <?php } ?>
        </tbody>
    </table>
    
    
    <h3>Ajouter un editeur :</h3>
    
    <form action="/projetolibrary/OLibrary/Etape3/Olibrary/autorites/" method="post">
        <div class="row center"><div class="input col l10 s12"><input type="text" name="editeur_nom" placeholder="Nom de l'éditeur"></div>
        <input type="submit" class="btn waves-effect waves-light blue" name="editeur"></div>
    </form>

    <table class="centered responsive-table highlight">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_editeur as $req_editeur){ ?>
            <tr>
                <td><?= $req_editeur['editeur_id']?></td>
                <td><?= $req_editeur['editeur_nom']?></td>
            </tr> <?php } ?>
        </tbody>
    </table>


    <h3>Ajouter un fournisseur :</h3>
    
    <form action="/projetolibrary/OLibrary/Etape3/Olibrary/autorites/" method="post">
        <div class="row center"><div class="input col l10 s12"><input type="text" name="fournisseur_nom" placeholder="Nom du fournisseur"></div>
        <input type="submit" class="btn waves-effect waves-light blue" name="fournisseur"></div>
    </form>

    <table class="centered responsive-table highlight">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_fournisseur as $req_fournisseur){ ?>
            <tr>
                <td><?= $req_fournisseur['fournisseur_id']?></td>
                <td><?= $req_fournisseur['fournisseur_nom']?></td>
            </tr> <?php } ?>
        </tbody>
    </table>



        
    <h3>Ajouter une collection :</h3>
    
    <form action="/projetolibrary/OLibrary/Etape3/Olibrary/autorites/" method="post">
        <div class="row center"><div class="input col l5 s12"><input type="text" name="collection_nom" placeholder="Nom de la collection"></div>
        <div class="col l5 s12>"> <select name="editeur_id">
            <option disabled selected>Editeur id </option>
            <?php
                    foreach($editeur_id as $edit_id){
                    echo "<option>".$edit_id['editeur_id']." - ".$edit_id['editeur_nom'];?> </option><?php } ?>
        </select></div>
        <input type="submit" class="btn waves-effect waves-light blue" name="collection"></div>

    </form>

    <table class="centered responsive-table highlight">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Id de l'éditeur</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete_collection as $req_collection){ ?>
            <tr>
                <td><?= $req_collection['collection_id']?></td>
                <td><?= $req_collection['collection_nom']?></td>
                <td><?= $req_collection['editeur_id']?></td>
            </tr> <?php } ?>
        </tbody>
    </table>
        
        
        
        
    <h3>Ajouter un livre :</h3>
    <form action="/projetolibrary/OLibrary/Etape3/Olibrary/autorites/" method="post">
        <div class="row center"> <div class="col l2 s12"><input type="text" name="livre_ISBN" placeholder="ISBN"></div>
            <div class="col l2 s12"><input type="text" name="livre_titre" placeholder="Titre"></div>

            <div class="col l2 s10"> <input type="date" name="date" placeholder="Date parution"></div>

            <div class="col l2 s12">

        <select name="auteur_id">
           
            <option disabled selected>Auteur id </option>
            <?php
            foreach($auteur_id as $aut_id){

                echo "<option>".$aut_id['auteur_id']." - ".$aut_id['auteur_nom'];?> </option><?php } ?>
        </select></div>

            <div class="col l2 s12">

        <select name="collection_id">
            <option disabled selected>Collection id </option>
            <?php
            foreach($collection_id as $coll_id){

                echo "<option placeholder='Collection'>".$coll_id['collection_id']." - ".$coll_id['collection_nom'];?> </option><?php } ?>
        </select></div>

            <div class="col l2 s12"><select name="fournisseur_id">
                    <option disabled selected>Fournisseur id </option>
                    <?php
                    foreach($fournisseur_id as $fourn_id){
                        echo "<option>".$fourn_id['fournisseur_id']." - ".$fourn_id['fournisseur_nom'];?> </option><?php } ?>
                </select></div>

        </div>



        <div class="row center">
            <div class="col l2 s4"> <input type="text" name="nb_exemplaire" placeholder="Nombre d'exemplaires"></div>


        <div class="col l8 s12"><textarea name="synopsis" placeholder="Synopsis"></textarea></div>

        <input type="submit" class="btn waves-effect waves-light blue" name="livre"></div>


    </form>



</main>

<script>
    $(document).ready(function() {
        $('select').material_select();
        $('.modal').modal();
    });
    
</script>

