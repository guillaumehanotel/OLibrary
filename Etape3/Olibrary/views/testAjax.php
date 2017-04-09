<?php



require('../config.php');
$bdd = new PDO("mysql:host=localhost;dbname=".$config["base"].";charset=utf8",
    $config["loginBDD"], $config["mdpBDD"]);

$content = $_GET['content'];
$class = $_GET['class'];


$requete_livre =
    "SELECT livre_titre, livre_groupe, auteur_nom, auteur_prenom, COUNT(livre_groupe) AS cpt
    FROM livre l, auteur a
    WHERE l.auteur_id = a.auteur_id
    GROUP BY livre_groupe, livre_titre, auteur_nom, auteur_prenom";




if ($content == "auteur"){
    $requete_livre.=" ORDER BY auteur_nom";

    if($class == "asc"){
        $requete_livre.=" ASC";
    } elseif ($class == "desc"){
        $requete_livre.=" DESC";
    }

}



$reponse_livre = $bdd->query($requete_livre);
$resultat_livre = $reponse_livre->fetchAll();



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


