
<main id="gestionDocuments" class="content container">


           <h2 class="soustitre">Gestion des documents</h2>


    <table class="centered striped">
        <thead>
        <tr>

            <th>Titre</th>
            <th>Utiliseur</th>
            <th>Type</th>
            <th>Date emprunt</th>
            <th>Date retour</th>

        </tr>
        </thead>
         <tr>
            <?php foreach ($resultat_emprunt as $emprunt)
            { ?>

            <td> <?= $emprunt['notice_titre']; ?> </td>
            <td> <?= $emprunt['user_prenom']; ?> <?= $emprunt['user_nom']; ?> </td>
            <td><?php if($emprunt['is_reservation']){
                    echo "Réservation";
                } else {
                    echo "Emprunt";
                }
                ?>
            </td>
            <td> <?= $emprunt['emprunt_date']; ?> </td>   
            <td> <?= $emprunt['emprunt_retour']; ?> </td>

        </tr>
        <?php
        }
        ?>
    </table>

</main>