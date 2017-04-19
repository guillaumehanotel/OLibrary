<?php


function DansBase($email,$bdd) {
    $sql = "SELECT user_mail FROM utilisateur WHERE user_mail='$email'";
    $resultat = $bdd->query($sql);
    $info = $resultat->fetchAll(PDO::FETCH_ASSOC);
    if($info!=null) {
        return true;
    } else {
        return false;
    }
}

function GetUser($email,$bdd) {
    $sql = "SELECT * FROM utilisateur WHERE user_mail='$email'";
    $resultat = $bdd->query($sql);
    $user = $resultat->fetch();
    if(!empty($user)) {
        return $user;
    } else {
        return null;
    }
}

function alertMsg($string){
    echo "<script type=\"text/javascript\">";
    echo "alert('$string');";
    echo "window.history.back();";
    echo "</script>";
}

function securify($str){
    $invalid_characters = array("$", "%", "#", "<", ">", "|");
    $string = str_replace($invalid_characters, "", $str);
    return htmlspecialchars($string);
}