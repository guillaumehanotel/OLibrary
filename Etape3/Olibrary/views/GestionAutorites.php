<main id="gestionAutorites"  class="content container">
          
           <h2 class="soustitre">Gestion des autorités</h2>

    <h3>Ajouter un auteur :</h3>
    <form action="" method="post">
        <input type="text" name="auteur_nom" placeholder="Nom">
        <input type="text" name="auteur_prenom" placeholder="Prénom">
        <input type="submit" name="auteur">
    </form>

    <h3>Ajouter un editeur :</h3>
    <form action="" method="post">
        <input type="text" name="editeur_nom" placeholder="Nom de l'éditeur">
        <input type="submit" name="editeur">
    </form>

    <h3>Ajouter un fournisseur :</h3>
    <form action="" method="post">
        <input type="text" name="fournisseur_nom" placeholder="Nom du fournisseur">
        <input type="submit" name="fournisseur">
    </form>

    <h3>Ajouter une collection :</h3>
    <form action="" method="post">
        <input type="text" name="collection_nom" placeholder="Nom de la collection">
        <select name="editeur_id">
            <option disabled selected>Editeur id </option>
            <?php
                    foreach($editeur_id as $edit_id){
                    echo "<option>".$edit_id['editeur_id']." - ".$edit_id['editeur_nom'];?> </option><?php } ?>
        </select>
        <input type="submit" name="collection">
    </form>

    <h3>Ajouter un livre :</h3>
    <form action="" method="post">
        <input type="text" name="livre_ISBN" placeholder="ISBN">
        <input type="text" name="livre_titre" placeholder="Titre">
        <input type="text" name="nb_exemplaire" placeholder="Nombre d'exemplaires">
        <input type="date" name="date" placeholder="Date parution">

        <textarea name="synopsis" placeholder="Synopsis"></textarea>

        <select name="auteur_id">
            <option disabled selected>Auteur id </option>
            <?php
            foreach($auteur_id as $aut_id){
                echo "<option>".$aut_id['auteur_id']." - ".$aut_id['auteur_nom'];?> </option><?php } ?>
        </select>

        <select name="collection_id">
            <option disabled selected>Collection id </option>
            <?php
            foreach($collection_id as $coll_id){
                echo "<option placeholder='Collection'>".$coll_id['collection_id']." - ".$coll_id['collection_nom'];?> </option><?php } ?>
        </select>

        <select name="fournisseur_id">
            <option disabled selected>Fournisseur id </option>
            <?php
            foreach($fournisseur_id as $fourn_id){
                echo "<option>".$fourn_id['fournisseur_id']." - ".$fourn_id['fournisseur_nom'];?> </option><?php } ?>
        </select>

        <input type="submit" name="livre">


    </form>



</main>