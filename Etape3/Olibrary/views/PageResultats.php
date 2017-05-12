<main id="pageResultats"  class="content container">


    <div class='container'>
        <br>
        <nav id="searchbar" class="col m12 valign">
            <div class="nav-wrapper">
                <form action="<?php echo BASE_URL."/pageresultats/"; ?>" method="get">
                    <div class="input-field" id="inputsearch">
                        <input id="search" type="search" name="recherche" value="<?= $recherche ?>" required>
                        <label class="label-icon" for="search"><i id="loupe" class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
        <!-- pages résultats ou aucun résultats -->
            <?php
                if($requete_livre==false){

                    ?>
            <h3>Aucun résultat</h3>

            <?php
                }
                elseif($requete_livre==true){
            ?>


            <h2>Résultats de la recherche</h2>


            <?php
        }

        ?>

        </div>


<div class="row">
        <?php foreach($requete_livre as $req_livre){

            ?>

            <div class="col s12 m6 l12">

                <h3 class="header"><?=$req_livre['notice_titre']?></h3>
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="http://lorempixel.com/100/190/nature/6">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title"><?=$req_livre['auteur_nom']." ".$req_livre['auteur_prenom']?></span>
                            <p><?=$req_livre['notice_synopsis']?></p>
                        </div>
                        <div class="card-action">
                            <a href="<?php echo BASE_URL."/descriptionlivre/?id=".$req_livre['notice_id']?>">Voir le livre</a>
                        </div>
                    </div>
                </div><br>
                <div class="divider"></div>
            </div>





<?php }?>
    </div>








</main>