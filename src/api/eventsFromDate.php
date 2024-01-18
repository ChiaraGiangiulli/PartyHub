<?php include '../db/query.php';

require_once '../view/homeBar.php';
require_once '../view/search.php';
require_once '../view/searchDate.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$date = date($_POST['data']);
$res = $dbh->getEventFromDate($date);
foreach ($res as $risultato) {
    print_r($risultato['Nome']);
}


?>