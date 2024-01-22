<?php
require_once("database.php");
$templateParams["titolo"] = "Search event";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutoSearch"] = "view/searchEvent-view.php";

require("view/base.php");
?>