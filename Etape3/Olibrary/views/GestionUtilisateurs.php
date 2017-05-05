<main id="gestionUtilisateurs"  class="content container">


           <h2 class="soustitre">Gestion des utilisateurs</h2>


    <table class="centered striped">
        <thead>
        <tr>

            <th class="user_prename">Nom - Prénom</th>
            <th class="user_mail">mail</th>
            <th class="user_delete">Supprimer</th>
        </tr>
        </thead>
         <tr>
            <?php foreach ($resultat_utilisateur as $utilisateur)
            { ?>

               <td><?php if($utilisateur['is_admin']==true){
                    echo "<i id='admin' class='material-icons'>perm_identity</i>";
                } ?><?= $utilisateur['user_nom']; ?> <?= $utilisateur['user_prenom']; ?></td>
            <td> <?= $utilisateur['user_mail']; ?> </td>
            <td>  <a href="<?= BASE_URL."/supprUser";?>/?id=<?= $utilisateur['user_num']?>"> <i class='material-icons'>delete</i></a> </td>
        </tr>
        <?php
        } 
     ?>
    </table>

</main>