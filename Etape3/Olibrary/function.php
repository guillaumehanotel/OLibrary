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

function isEnRetard($date){

    // comparer date du jour et date en paramètre et renvoie vrai si la date passée en paramètre est supérieur à la date du jour
    $today = date("Y-m-d");

    $today_time = strtotime($today);
    $date_time = strtotime($date);

    if ($today_time > $date_time) {
        return true;
    } else {
        return false;
    }


}














