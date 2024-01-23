<?php
require_once("database.php");
$templateParams["titolo"] = "Search date";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutoSearch"] = "view/searchDate-view.php";
if(isset($_POST['data'])){
    $templateParams["risultatoSearch"] = $dbh->getEventFromDate(date($_POST['data']));
}
require("view/base.php");
?>