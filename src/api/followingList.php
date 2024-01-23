<?php require_once("../database.php");
    $user = $_SESSION['userId'];
    $following = $dbh->getFollowing($user);
    foreach ($following as $risultato) {
        print_r($risultato['Following']);
    }
?>