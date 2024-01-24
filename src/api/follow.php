<?php require_once("../database.php");
$user = $_POST["userId"];
$dbh->follow($_SESSION['userId'], $user);
?>