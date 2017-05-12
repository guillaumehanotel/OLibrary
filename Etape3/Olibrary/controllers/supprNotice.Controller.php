<?php

$id=securify((int)$_GET['id']);

$reponse = $bdd->query("DELETE FROM notice WHERE notice_id='$id'");


header("Location:".BASE_URL."/notices/");