<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$date = $_POST['data'];
$res = $dbh->getEventFromDate($date);
foreach ($res as $risultato) {
    print_r($risultato['Nome']);
}


?>