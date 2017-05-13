<main id="supprimerEditeur" class="content container">
    <h2 class="soustitre">Supprimer un éditeur</h2>

    <p>Vous êtes sur le point de supprimer l'éditeur <strong><?= $resultat_editeur["editeur_nom"]?></strong>.</p>


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




    Êtes vous sûr de vouloir supprimer cet éditeur ?
    <form action="" method="post">
        <input type="submit" name="delete_editeur" value="X">
    </form>

    </p>
</main>