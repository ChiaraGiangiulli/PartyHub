<?php
require_once("database.php");
$templateParams["titolo"] = "Search event";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutoSearch"] = "view/searchEvent-view.php";
if(isset($_POST['search'])){
    $templateParams["risultatoSearch"] = $dbh->getEventFromName(($_POST['search']));
}
require("view/base.php");
?>