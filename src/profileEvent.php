<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile-view.php";
$templateParams["contenutoProfilo"] = "view/profileEvent-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
$templateParams["eventi"] = $dbh->getEventFromUser($_GET['user']);

require("view/base.php");
?>