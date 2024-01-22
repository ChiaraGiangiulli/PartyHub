<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_SESSION["userId"]);
$templateParams["post"] = $dbh->getPostsFromUser($_SESSION["userId"]);
$templateParams["eventi"] = $dbh->getEventsFromUser($_SESSION["userId"]);
$templateParams["js"] = array("/js/profile.js");

require("template/base.php");
?>