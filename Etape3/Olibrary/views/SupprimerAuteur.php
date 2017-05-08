<main id="supprimerAuteur" class="content container">
    <h2 class="soustitre">Supprimer un auteur</h2>

    <p>Vous êtes sur le point de supprimer l'auteur <strong><?= $reqaut["auteur_prenom"]." ".$reqaut["auteur_nom"]?></strong>.</p>



    <?php if($resultat_exemplaire['total'] != 0){
        if($resultat_exemplaire['total'] == 1){ ?>
            <p>- <?= $resultat_exemplaire['total'] ?> exemplaire sera supprimé </p>
            <?php
        }else {
            ?>
            <p>- <?= $resultat_exemplaire['total'] ?> exemplaires seront supprimés </p>
            <?php
        }
    } ?>

    <?php if($resultat_emprunt['total'] != 0){
        if($resultat_emprunt['total'] == 1){ ?>
            <p>- <?= $resultat_emprunt['total'] ?> emprunt sera supprimé </p>
            <?php
        }else {
            ?>
            <p>- <?= $resultat_emprunt['total'] ?> emprunts seront supprimés </p>
            <?php
        }
    } ?>



    <div class="row">
        <div class="col m8 offset-m2">

            <table class="centered striped">
                <?php foreach ($reqnot as $requete){ ?>
                    <tr><td><?=$requete["notice_titre"]?></td></tr>
                <?php } ?>
            </table>
        </div>
    </div>



        Êtes vous sûr de vouloir supprimer cet auteur ?
    <form action="" method="post">
        <input type="submit" name="delete_aut" value="X">
    </form>

    </p>
</main>