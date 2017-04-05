<?php
$recherche=$_GET['recherche'];


$requetelivre=$bdd->query("SELECT * FROM livre l JOIN auteur a ON l.auteur_id = a.auteur_id WHERE l.livre_titre LIKE '%$recherche%'");
$requete_livre = $requetelivre->fetchAll();


if($requete_livre==false){
    ?>

    <div class='container'>
        <br>
        <nav id="searchbar" class="col m12 valign">
            <div class="nav-wrapper">
                <form action="<?php echo BASE_URL."/pageresultats/"; ?>" method="get">
                    <div class="input-field" id="inputsearch">
                        <input id="search" type="search" name="recherche" required>
                        <label class="label-icon" for="search"><i id="loupe" class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
        <h3>Aucun résultat</h3>
    </div>

<?php

}
elseif($requete_livre==true){
    ?>
    <div class='container'>
        <br>
        <nav id="searchbar" class="col m12 valign">
            <div class="nav-wrapper">
                <form action="<?php echo BASE_URL."/pageresultats/"; ?>" method="get">
                    <div class="input-field" id="inputsearch">
                        <input id="search" type="search" name="recherche" required>
                        <label class="label-icon" for="search"><i id="loupe" class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
        <h2>Résultats de la recherche</h2></div>

<?php
}



require $_dir["views"]."PageResultats.php";





