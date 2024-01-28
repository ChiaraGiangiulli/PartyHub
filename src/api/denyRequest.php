<?php require_once("../database.php");
$idNotifica = $_POST['notification'];
$richiesta = $dbh->requestFromNotification($idNotifica)[0];
$dbh->requestDenied($richiesta['UserPartecipante'], $richiesta['idEvento']);
?>