<main id="gestionUtilisateurs"  class="content container">


           <h2 class="soustitre">Gestion des utilisateurs</h2>


    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>mail</th>
            <th>Admin</th>
            <th>Supprimer</th>
        </tr>
        </thead>
         <tr>
            <?php foreach ($resultat_utilisateur as $utilisateur)
            { ?>
                <td><?= $utilisateur['user_num']; ?></td>
               <td><?= $utilisateur['user_nom']; ?></td>
               <td><?= $utilisateur['user_prenom']; ?></td>
            <td> <?= $utilisateur['user_mail']; ?> </td>
            <td> <?= $utilisateur['is_admin']; ?></td>
            <td> <?= '<a href="supprimer.php?id='.$utilisateur['user_num'].'">Supprimer</a>'; ?> </td>
        </tr>
        <?php
        } 
     ?>
    </table>

</main>