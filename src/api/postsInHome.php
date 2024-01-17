<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

session_start();
$user = $_SESSION["user_id"];
$res = $dbh->getFollowersPosts($user);
foreach ($res as $risultato) {
    print_r($risultato['Testo']);
}


?>