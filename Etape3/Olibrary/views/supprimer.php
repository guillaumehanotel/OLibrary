<?php
$id = $_POST['id'];
if (isset($id) AND !(empty($id)))
{
    connect_db ('localhost', 'olibrary', 'erty', 'olibrary');
    $req = $bdd->query("DELETE FROM utilisateur WHERE id=$id");
    HEADER('Loacation : GestionUtilisateurs.php');
}