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



function getResultatsRequete($bdd, $requete){
    $reponse_requete = $bdd->query($requete);
    if($reponse_requete != false) {
        $resultat_requete = $reponse_requete->fetchAll();
        return $resultat_requete;
    } else {
        printErrorInfo($bdd);
        return array();
    }
}


function getResultatRequete($bdd, $requete){

    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $reponse_requete = $bdd->query($requete);
    if($reponse_requete != false) {
        $resultat_requete = $reponse_requete->fetch();
        return $resultat_requete;
    } else {
        printErrorInfo($bdd);
        return array();
    }
}

function printErrorInfo($bdd){

    echo "<br><strong style='text-align: center'>PDO::errorInfo():</strong>";

    echo "<table border='1' style='border:1px solid; margin-left: auto ; margin-right : auto ; width: 60%'>"
    ,"<thead>"
    ,"<tr>"
    ,"<th>SQL STATE</th>"
    ,"<th>DRIVER ERROR CODE</th>"
    ,"<th>MESSAGE</th>"
    ,"</tr>"
    ,"</thead>"

    ,"<tbody>"
    ,"<tr>";
    foreach($bdd->errorInfo() as $key => $element){
        $str ="";
        switch($key){
            case 0 :
                $str.=$element;
                break;
            case 1 :
                $str.=$element;
                break;
            case 2 :
                $str.=$element;
                break;
            default :
                $str.="Undefined";
                break;
        }
        echo "<td><a target='_blank' href='http://www.google.com/search?q=".urlencode($str)."'>$str</a></td>";
    }
    echo "</tr>"
    ,"</tbody>"
    ,"</table>";


}







