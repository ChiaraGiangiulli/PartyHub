<?php
require_once("database.php");
$templateParams["titolo"] = "Event Budget";
$templateParams["contenutoEvent"] = "view/eventBudget-view.php";
$templateParams["spese"] = $dbh->getListFromEvent($_GET['id']);
$templateParams["evento"] = $dbh->getEventFromId($_GET['id']);
$templateParams["js"] = array("js/eventInput.js");
require("view/event-view.php");
?>