<main id="gestionNotices"  class="content container">

           <h2 class="soustitre">Gestion des notices et des exemplaires</h2>



    <table class="centered striped">
        <thead>
        <tr>
            <th data-field="titre">Titre</th>
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
                <td>
                    <?= $value['livre_titre'];?>
                </td>
                <td>
                    <?= $value['auteur_prenom'];?> <?=$value['auteur_nom'];?>
                </td>
                <td>
                    <?= $value['cpt'];?>
                </td>
                <td> <a href='<?= BASE_URL."/showLivre"; ?>/?id=<?= $value['livre_groupe'] ?>'><i class="small material-icons">visibility</i></a></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>

    <br>



</main>