<?php include '../db/query.php';

require_once '../view/homeBar.php';
require_once '../view/search.php';
require_once '../view/searchProfile.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$user = $_POST['search'];
$res = $dbh->getUserFromUsername($user);
foreach ($res as $risultato) {
    print_r($risultato['Nome']);
}


?>