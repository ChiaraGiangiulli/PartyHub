<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_SESSION["userId"]);
$templateParams["js"] = array("js/like.js", "js/comments.js", "js/notification.js", "js/manageRequest.js");

require("view/base.php");
?>