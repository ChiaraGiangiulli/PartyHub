<?php 
include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

if(isset($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['pwd'],  $_POST['email'], $_POST['dob'])){
    $dbh->createUser($_POST['name'], $_POST['surname'], $_POST['username'], password_hash($_POST['pwd'], PASSWORD_DEFAULT), $_POST['email'], $_POST['dob'], null);
    echo "Signup eseguito con successo";
}

?>