<?php
require_once("database.php");
$templateParams["titolo"] = "Event Planning";
$templateParams["contenutoEvent"] = "view/eventPlanning-view.php";
$templateParams["sondaggi"] = $dbh->getSurveyFromEvent($_GET['id']);
$templateParams["evento"] = $dbh->getEventFromId($_GET['id']);
$templateParams["post"] = $dbh->getPostForEvent($_GET['id']);
$templateParams["js"] = array("js/comments.js");
require("view/event-view.php");
?>