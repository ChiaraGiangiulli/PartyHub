<?php
require_once("database.php");
$templateParams["titolo"] = "User";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
$templateParams["js"] = array("js/otherUser.js");
require("view/otherUsers-view.php");
?>