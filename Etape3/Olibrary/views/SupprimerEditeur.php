<main id="supprimerEditeur" class="content container supprimerAutorité">

    <div class="row">
        <a href="<?= BASE_URL."/autorites/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="red-text soustitre">SUPPRESSION EDITEUR</h2>
    </div>


    <p>Vous êtes sur le point de supprimer l'éditeur <strong><?= $resultat_editeur["editeur_nom"]?></strong>.</p>

    <div class="divider"></div>


    <?php if($resultat_collection_cpt['total'] != 0) { ?>
        <p><?= $resultat_collection_cpt['total'] ?> collection(s) sont associés à cet éditeur.</p>

        <div class="row">
            <div class="col m8 offset-m2">

                <table class="centered striped">
                    <?php foreach ($resultat_collection as $collection){ ?>
                        <tr><td><?=$collection["collection_nom"]?></td></tr>
                    <?php } ?>
                </table>
            </div>
        </div>




        <?php if ($resultat_exemplaire_cpt['total'] != 0) { ?>
            <p>La suppression de ces collections entrainera la perte de :</p>
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
    }?>


    <div class="divider"></div>


    <p>Êtes vous sûr de vouloir supprimer cet éditeur ?</p>
    <form action="" method="post">
        <input type="submit" name="delete_editeur" class="btn red" value="SUPPRIMER">
    </form>

    </p>
</main>