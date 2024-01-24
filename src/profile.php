<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_SESSION["userId"]);
$templateParams["js"] = array("js/profile.js");

require("view/base.php");
?>