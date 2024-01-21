<?php 
include '../view/profile.php';
include include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$user = $_SESSION["user_id"];
$res = $dbh->getEventsFromUser($user);
foreach ($res as $risultato) {
    print_r($risultato['Nome']);
}


?>