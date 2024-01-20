<?php 
require_once '../view/profile.php';
include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

$user = $_SESSION["user_id"];
$res = $dbh->getPostsFromUser($user);
foreach ($res as $risultato) {
    print_r($risultato['Testo']);
}


?>