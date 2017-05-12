<?php
$id=securify((int)$_GET['id']);
$req = $bdd->query("DELETE FROM utilisateur WHERE user_num=$id");
header("Location:".BASE_URL."/utilisateurs/");