<main id="menuGestion" class="container">

    <div class="row">
        <a href="<?= BASE_URL."/index/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="soustitre">Gestionnaire de l'application</h2>
    </div>

    <div class="row center-align ">


        <div id="elem_left" class="col m8">

            <a href="<?php echo BASE_URL."/notices/"; ?>">
                <div class="col m5 offset-m1 elem_gestion">
                    <span>Gestion des notices et des exemplaires</span>
                </div>
            </a>

            <a href="<?php echo BASE_URL."/autorites/"; ?>">
                <div class="col m5 elem_gestion">
                    Gestion des Autorités
                </div>
            </a>

            <a href="<?php echo BASE_URL."/emprunteurs/"; ?>">
                <div class="col m5  offset-m1 elem_gestion">
                    Gestion des  Emprunteurs
                </div>
            </a>

            <a href="<?php echo BASE_URL."/documents/"; ?>">
                <div class="col m5 elem_gestion">
                    Gestion  des Documents
                </div>
            </a>

        </div>

        <div id="elem_right" class="col m4">
            <a href="<?php echo BASE_URL."/utilisateurs/"; ?>">
                <div class="elem_gestion">
                    Gestion des  Utilisateurs
                </div>
            </a>

        </div>


    </div>

</main>
