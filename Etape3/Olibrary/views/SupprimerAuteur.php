<main id="supprimerAuteur" class="content container">
    <h2 class="soustitre">Supprimer un auteur</h2>

<?php foreach ($reqaut as $req_auteur){ ?>
    <p>Vous êtes sur le point de supprimer l'auteur <strong><?= $req_auteur["auteur_prenom"]." ".$req_auteur["auteur_nom"]?></strong>.<br/>
<?php } ?>

        Cette opération entrainera la suppression des éléments suivant :<br>
    Notices et exemplaires :<br/>

<?php foreach ($reqnot as $requete){ ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$requete["notice_titre"]?><br>
<?php } ?>

        et annulera l'emprunt ou la réservation des notices suivantes :<br>
        <?php foreach ($reqemp as $requete){ ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$requete["notice_titre"]?><br>
        <?php } ?>

        Êtes vous sûr de vouloir supprimer cet auteur ?
    <?php foreach ($reqaut as $req_auteur){ ?>
    <form action="" method="post">
        <input type="submit" name="delete_aut" value="X">
    </form>
<?php } ?>

    </p>
</main>