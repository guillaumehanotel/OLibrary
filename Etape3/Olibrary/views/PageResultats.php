<main id="pageResultats"  class="content container">



<div class="row">
            <?php foreach($requete_livre as $req_livre){

                ?>

                <div class="col s12 m6 l12">

                    <h3 class="header"><?=$req_livre['livre_titre']?></h3>
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="http://lorempixel.com/100/190/nature/6">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <span class="card-title"><?=$req_livre['auteur_nom']." ".$req_livre['auteur_prenom']?></span>
                                <p><?=$req_livre['synopsis']?></p>
                            </div>
                            <div class="card-action">
                                <a href="#">Voir le livre</a>
                            </div>
                        </div>
                    </div><br>
                    <div class="divider"></div>
                    </div>





<?php }?>
    </div>








</main>