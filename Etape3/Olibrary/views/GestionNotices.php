<main id="gestionNotices"  class="content">

    <h2 class="soustitre">Gestion des notices et des exemplaires</h2>

    <div class="container">

        <table class="centered striped">
            <thead>
            <tr>
                <th data-field="titre"><a id="titre" href="#" class="asc">Titre</a></th>
                <th data-field="auteur"><a id="auteur" href="#" class="asc">Auteur</a></th>
                <th data-field="nb">Nombre d'exemplaires</th>
                <th data-field="showExempl">Voir les exemplaires</th>
            </tr>
            </thead>
            <tbody id="bodyLivres">



            <!-- -->
            <?php
            foreach ($resultat_livre as $value){?>
                <tr>
                    <td class="notice_titre"><?= $value['notice_titre'];?></td>
                    <td class="auteur_name"><?= $value['auteur_prenom'];?> <?=$value['auteur_nom'];?></td>
                    <td class="cpt"><?= $value['cpt'];?></td>
                    <td class="link"> <a href='<?= BASE_URL."/exemplaires"; ?>/?id=<?= $value['notice_id'] ?>'><i class="small material-icons">visibility</i></a></td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>

        <br>


</div>
</main>