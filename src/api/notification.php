<?php require_once("../database.php");
foreach($dbh->getNotificationsFromUser($_SESSION['userId']) as $notification){
    $dbh->setNotificationSeen($notification['idNotifica']);
}
?>