<?php
require_once("database.php");
$templateParams["titolo"] = "Event";
$templateParams["evento"] = $dbh->getEventFromId($_GET['id']);
$templateParams["js"] = array("js/like.js", "js/comments.js");
require("view/event-view.php");
?>