<?php include '../db/query.php';

require_once '../view/homeBar.php';
require_once '../view/search.php';
require_once '../view/searchEvent.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$name = $_POST['search'];
$res = $dbh->getEventFromName($name);
 
echo "<script>window.open('../view/event.php','_self')</script>"; 



?>