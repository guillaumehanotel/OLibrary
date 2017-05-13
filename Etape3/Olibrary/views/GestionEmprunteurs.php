<main id="gestionEmprunteurs"  class="content container">

    <h2 class="soustitre">Gestion des Emprunteurs</h2>



    	 <table class="centered striped">
    	 <thead>
    	 <tr>
    	 	<tr>
                <th data-field="utilisateur"><a id="utilisateur" href="#" class="asc">Utilisateur</a></th>
                <th data-field="notice"><a id="notice" href="#" class="asc">Nom des Livres</a></th>
                <th data-field="dateEmprunt"><a id="dateEmprunt" href="#" class="asc">Emprunt date début</a></th>
                <th data-field="dateEmpruntRetour"><a id="dateEmpruntRetour" href="#" class="asc">Emprunt date retour</a></th>
                <th>Retard</th>
                


         </tr>
    	 </thead>
    	 <tbody id="bodyEmprunts">
    	 	


    	<?php
    	foreach ($resultat_commande as $value) {?>

    		<tr class="selectable link_emprunts" id="row_<?= $value['user_num'] ?>">

                       

                        <td class="user_name"><?= $value['user_prenom'];?> <?=$value['user_nom'];?></td>

                        <td class="notice_name"><?= $value['notice_titre'];?></td>

                        <td class="emprunt_date"><?= date('d/m/Y', strtotime($value['emprunt_date'])); ?> </td>

                        <td class="emprunt_retour"><?= date('d/m/Y', strtotime($value['emprunt_retour'])); ?></td>

                        <td>
                            <?php
                                if(isEnRetard($value['emprunt_retour'])){
                                    echo "<i class='red-text fa fa-exclamation-triangle fa-3x' aria-hidden='true'></i>";
                                } else {
                                    //echo "à l'heure";
                                }
                            ?>
                        </td>

                        
                        
                    </tr>

                <?php
            }
            ?>


    		</tbody>
    	</table>

    	<br>

    	 <table class="centered striped">
    	 <thead>
    	 <tr>
    	 	<tr>
                <th data-field="utilisateur"><a id="utilisateur" href="#" class="asc">Utilisateur</a></th>
                <th data-field="notice"><a id="notice" href="#" class="asc">Nom des Livres</a></th>
                <th data-field="dateEmprunt"><a id="dateEmprunt" href="#" class="asc">Emprunt date début</a></th>
                <th data-field="dateEmpruntRetour"><a id="dateEmpruntRetour" href="#" class="asc">Emprunt date retour</a></th>
                

         </tr>
    	 </thead>
    	 <tbody id="bodyEmprunts">
    	 	


    	<?php
    	foreach ($resultat_reservation as $value) {?>

    		<tr class="selectable link_emprunts" id="row_<?= $value['user_num'] ?>">

                       

                        <td class="user_name"><?= $value['user_prenom'];?> <?=$value['user_nom'];?></td>

                        <td class="notice_name"><?= $value['notice_titre'];?></td>

                        <td class="emprunt_date"><?=  date('d/m/Y', strtotime($value['emprunt_date'])) ?></td>

                        <td class="emprunt_retour"><?=  date('d/m/Y', strtotime($value['emprunt_retour'])); ?></td>

                        
                        
                    </tr>

                <?php
            }
            ?>


    		</tbody>
    	</table>
    	
    	<br>

    	<script type="text/javascript">
            var $base_url = <?php echo json_encode(BASE_URL); ?>;
        </script>



  
</main>