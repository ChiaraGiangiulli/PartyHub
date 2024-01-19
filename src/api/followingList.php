<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

session_start();
$user = $_SESSION['user_id'];
$following = $dbh->getFollowing($user);
foreach ($following as $risultato) {
    print_r($risultato['Following']);
}

?>