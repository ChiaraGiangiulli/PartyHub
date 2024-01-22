<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile-view.php";
$templateParams["contenutoProfilo"] = "view/profileEvent-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_SESSION["userId"]);
$templateParams["eventi"] = $dbh->getEventsFromUser($_SESSION["userId"]);

require("view/base.php");
?>