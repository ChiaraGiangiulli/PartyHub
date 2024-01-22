<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile-view.php";
$templateParams["contenutoProfilo"] = "view/profilePost-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_SESSION["userId"]);
$templateParams["post"] = $dbh->getPostsFromUser($_SESSION["userId"]);

require("view/base.php");
?>