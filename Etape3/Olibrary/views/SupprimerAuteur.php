<main id="supprimerAuteur" class="content container supprimerAutorité">


    <div class="row">
        <a href="<?= BASE_URL."/autorites/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="red-text soustitre">SUPPRESSION AUTEUR</h2>
    </div>



    <p>Vous êtes sur le point de supprimer l'auteur <strong><?= $reqaut["auteur_prenom"]." ".$reqaut["auteur_nom"]?></strong>.</p>

    <div class="divider"></div>

    <?php if($resultat_notice_cpt['total'] != 0) { ?>
        <p><?= $resultat_notice_cpt['total'] ?> notice(s) sont associés à cet auteur.</p>

        <div class="row">
            <div class="col m8 offset-m2">

                <table class="centered striped">
                    <?php foreach ($reqnot as $requete){ ?>
                        <tr><td><?=$requete["notice_titre"]?></td></tr>
                    <?php } ?>
                </table>
            </div>
        </div>




        <?php if ($resultat_exemplaire_cpt['total'] != 0) { ?>
            <p>La suppression de ces notices entrainera la perte de :</p>
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


    <p>Êtes vous vraiment sûr de vouloir supprimer cet auteur ?</p>
    <form action="" method="post">
        <input type="submit" name="delete_aut" class="btn red" value="SUPPRIMER">
    </form>

    <div class="divider"></div>


</main>