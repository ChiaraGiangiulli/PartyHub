<?php
require_once("database.php");
$templateParams["titolo"] = "Search profile";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutosearch"] = "view/searchEvent-view.php";

require("view/base.php");
?>