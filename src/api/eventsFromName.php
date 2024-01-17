<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$name = $_POST['search'];
$res = $dbh->getEventFromName($name);
foreach ($res as $risultato) {
    print_r($risultato['Nome']);
}


?>