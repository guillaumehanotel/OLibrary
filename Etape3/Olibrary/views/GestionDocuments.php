
<main id="gestionDocuments" class="content container">


    <div class="row">
        <a href="<?= BASE_URL."/menugestion/"; ?>"><i id="arrowBack" class="black-text fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <h2 class="soustitre">GESTION DES DOCUMENTS</h2>
    </div>






    <h3 class="center">Liste des emprunts</h3>
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
            <td><?= $emprunt['is_reservation'] ? "Réservation" : "Emprunt"; ?></td>
            <td> <?=    date('d/m/Y', strtotime($emprunt['emprunt_date']))      ; ?> </td>   
            <td> <?= date('d/m/Y', strtotime($emprunt['emprunt_retour'])); ?> </td>

        </tr>
        <?php
        }
        ?>
    </table>

    <div class="divider"></div>



    <h3 class="center">Liste des réservations</h3>
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
            <?php foreach ($resultat_resa as $emprunt)
            { ?>

            <td> <?= $emprunt['notice_titre']; ?> </td>
            <td> <?= $emprunt['user_prenom']; ?> <?= $emprunt['user_nom']; ?> </td>
            <td><?= $emprunt['is_reservation'] ? "Réservation" : "Emprunt"; ?></td>
            <td> <?=    date('d/m/Y', strtotime($emprunt['emprunt_date']))      ; ?> </td>   
            <td> <?= date('d/m/Y', strtotime($emprunt['emprunt_retour'])); ?> </td>

        </tr>
        <?php
        }
        ?>
    </table>




</main>