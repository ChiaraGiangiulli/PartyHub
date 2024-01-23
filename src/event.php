<?php
require_once("database.php");
$templateParams["titolo"] = "Event";
$templateParams["evento"] = $dbh->getEventFromId($_GET['id']);

require("view/event-view.php");
?>