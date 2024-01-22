<?php
require_once("database.php");
$templateParams["titolo"] = "Search profile";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutoSearch"] = "view/searchProfile-view.php";

require("view/base.php");
?>