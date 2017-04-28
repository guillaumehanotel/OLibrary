<?php


    $titre = $resultat_notice['notice_titre'];
    $date = date ('Y', strtotime($resultat_notice['notice_date_parution']));
    $synopsis = $resultat_notice['notice_synopsis'];
    $auteur = $resultat_notice['auteur_prenom'].' '.$resultat_notice['auteur_nom'];
    $auteur_id = $resultat_notice['auteur_id'];


?>

<main id="gestionExemplaires"  class="content">

    <!-- <h2 class="soustitre">Gestion des exemplaires</h2> -->
    <h2 class="soustitre">GESTION DES EXEMPLAIRES</h2>

    <div class="container">

        <div class="row" id="notice_edit">


            <div class="col s12 m10 offset-m1">
                <div class="card">
                    <div class="card-content white-text">

                        <i id="mode_edit"  class="small material-icons right">mode_edit</i>

                        <h5 class="center">NOTICE</h5>
                        <span id="notice_titre" class="card-title"><?= $titre ?></span>
                        <p id="notice_auteur" data-id="<?= $auteur_id ?>"><?= $auteur ?></p>
                        <p id="notice_date"><?= $date ?></p>
                    </div>

                    <div id="notice_synopsis" class="card-action white-text">
                        <?=  $synopsis ?>
                    </div>

                </div>
            </div>


        </div>


        <h3></h3>




    </div>
</main>

<script type="text/javascript">

    var TabAuteurs = <?php echo json_encode($auteurs); ?>;

</script>