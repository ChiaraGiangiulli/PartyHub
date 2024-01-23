<?php
require_once("database.php");
$templateParams["titolo"] = "Event Budget";
$templateParams["contenutoEvent"] = "view/eventBudget-view.php";
$templateParams["sondaggi"] = $dbh->getSurveyFromEvent($_GET['id']);
$templateParams["evento"] = $dbh->getEventFromId($_GET['id']);

require("view/event-view.php");
?>