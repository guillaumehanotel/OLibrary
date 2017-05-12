
<main id="gestionDocuments" class="content container">


           <h2 class="soustitre">Gestion des documents</h2>


    <table class="centered striped">
        <thead>
        <tr>

            <th class="emprunt_retour">Date retour</th>
            <th class="user_mail">Date emprunt</th>
            <th class="user_mail">réservé ?</th>
            <th class="user_mail">Titre</th>

        </tr>
        </thead>
         <tr>
            <?php foreach ($resultat_emprunt as $emprunt)
            { ?>

            <td> <?= $emprunt['emprunt_retour']; ?> </td>
            <td> <?= $emprunt['emprunt_date']; ?> </td>   
            <td><?php if($emprunt['is_reservation']==true){
                    echo "oui";
                } ?></td>
            <td> <?= $emprunt['user_num']; ?> </td>
            <td> <?= $emprunt['notice_titre']; ?> </td>

        </tr>
        <?php
        }
        ?>
    </table>

</main>