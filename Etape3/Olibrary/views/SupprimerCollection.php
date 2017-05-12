<main id="supprimerCollection" class="content container">
    <h2 class="soustitre">Supprimer un collection</h2>

    <p>Vous êtes sur le point de supprimer la collection <strong><?= $resultat_collection["collection_nom"]?></strong>.</p>



    <?php if ($resultat_exemplaire_cpt['total'] != 0) { ?>
        <p>La suppression de cette collection entrainera la perte de :</p>
        <?php
        if ($resultat_exemplaire_cpt['total'] == 1) { ?>

            <p>- <?= $resultat_exemplaire_cpt['total'] ?> exemplaire  </p>
            <?php
        } else {
            ?>
            <p>- <?= $resultat_exemplaire_cpt['total'] ?> exemplaires  </p>
            <?php
        }
    } ?>

    <?php if ($resultat_emprunt_cpt['total'] != 0) {
        if ($resultat_emprunt_cpt['total'] == 1) { ?>
            <p>- <?= $resultat_emprunt_cpt['total'] ?> emprunt  </p>
            <?php
        } else {
            ?>
            <p>- <?= $resultat_emprunt_cpt['total'] ?> emprunts  </p>
            <?php
        }
    }
    ?>




    Êtes vous sûr de vouloir supprimer cette collection ?
    <form action="" method="post">
        <input type="submit" name="delete_collection" value="X">
    </form>

    </p>
</main>