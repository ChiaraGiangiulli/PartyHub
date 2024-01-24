<?php require_once("database.php");
    $user = $templateParams["profilo"][0]['Username'];
    $following = $dbh->getFollowing($user);
    foreach ($following as $risultato) {
        print_r($risultato['Following']);
    }
?>