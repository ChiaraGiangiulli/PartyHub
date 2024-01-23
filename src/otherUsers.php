<?php
require_once("database.php");
$templateParams["titolo"] = "User";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);

require("view/otherUsers-view.php");
?>