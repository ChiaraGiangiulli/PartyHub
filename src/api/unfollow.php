<?php require_once("../database.php");
$user = $_POST["userId"];
$dbh->unfollow($_SESSION['userId'], $user);
?>