<main id="gestionExemplaires"  class="content">

    <!-- <h2 class="soustitre">Gestion des exemplaires</h2> -->
    <h2 class="soustitre">GESTION DES EXEMPLAIRES</h2>

    <div class="container">

        <div class="row" id="notice_edit">


            <div class="col s12 m10 offset-m1">
                <div class="card grey darken-2">
                    <div class="card-content white-text">

                        <i id="mode_edit"  class="small material-icons right">mode_edit</i>

                        <h5 class="center">NOTICE</h5>
                        <span id="notice_titre" class="card-title"><?= $resultat_notice['notice_titre']  ?></span>
                        <p id="notice_date"><?= date ('Y', strtotime($resultat_notice['notice_date_parution']))  ?></p>
                    </div>
                    <div id="notice_synopsis" class="card-action white-text">
                        <?= $resultat_notice['notice_synopsis']  ?>
                    </div>
                </div>
            </div>


        </div>


        <h3></h3>




    </div>
</main>