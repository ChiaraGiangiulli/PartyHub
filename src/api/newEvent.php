<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

session_start();
$user = $_SESSION['user_id'];
print_r("ok");
?>