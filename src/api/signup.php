<?php 
include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

if(isset($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['dob'], $_POST['email'], $_POST['name'], $_POST['pwd'])){
    $dbh->createUser($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['pwd'], $_POST['email'], $_POST['dob'], null);
    echo "top";
}

?>