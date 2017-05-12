<?php

$id=securify((int)$_GET['id']);

$notice_id=securify((int)$_GET['notice_id']);

$reponse = $bdd->query("DELETE FROM exemplaire WHERE exemplaire_id='$id'");


header("Location:".BASE_URL."/exemplaires/?id=$notice_id");