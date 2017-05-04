<main id="gestionUtilisateurs"  class="content container">


           <h2 class="soustitre">Gestion des utilisateurs</h2>

    <?php
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=olibrary;', 'olibrary', 'erty');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->query('SELECT user_num, user_nom, user_prenom, user_mail, is_admin FROM utilisateur ');




    ?>
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
            <?php while ($donnees = $req->fetch())
            { ?>
                <td><?php echo htmlspecialchars($donnees['user_num']); ?></td>
               <td><?php echo htmlspecialchars($donnees['user_nom']); ?></td>
               <td><?php echo $donnees['user_prenom']; ?></td>
            <td> <?php echo nl2br(htmlspecialchars($donnees['user_mail'])); ?> </td>
            <td> <?php echo nl2br(htmlspecialchars($donnees['is_admin'])); ?></td>
            <td> <?php echo '<a href="supprimer.php?id='.$donnees['user_num'].'">Supprimer</a>'; ?> </td>
        </tr>
        <?php
        } // Fin de la boucle des billets
        $req->closeCursor(); ?>
    </table>

</main>