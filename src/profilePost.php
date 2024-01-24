<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenuto"] = "view/profile-view.php";
$templateParams["contenutoProfilo"] = "view/profilePost-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
$templateParams["post"] = $dbh->getPostsFromUser($_GET['user']);

require("view/base.php");
?>