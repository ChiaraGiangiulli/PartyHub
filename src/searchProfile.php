<?php
require_once("database.php");
$templateParams["titolo"] = "Search profile";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutoSearch"] = "view/searchProfile-view.php";
if(isset($_POST['search'])){
    $templateParams["risultatoSearchProfile"] = $dbh->getUsernameFromUser($_POST['search']);
}
require("view/base.php");
?>