<main id="supprimerCollection" class="content container supprimerAutorité">


    <div class="row">
        <a href="<?= BASE_URL."/autorites/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="red-text soustitre">SUPPRESSION COLLECTION</h2>
    </div>


    <p>Vous êtes sur le point de supprimer la collection <strong><?= $resultat_collection["collection_nom"]?></strong>.</p>

    <div class="divider"></div>


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


    <div class="divider"></div>


    <p>Êtes vous sûr de vouloir supprimer cette collection ?</p>
    <form action="" method="post">
        <input type="submit" name="delete_collection" class="btn red" value="SUPPRIMER">
    </form>

    </p>
</main>