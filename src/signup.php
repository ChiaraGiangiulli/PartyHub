<?php
require_once("database.php");
$templateParams["titolo"] = "Signup";
$templateParams["js"] = array("js/validation.js");

require("view/signup-view.php");
?>