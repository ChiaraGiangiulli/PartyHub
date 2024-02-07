<?php
require_once("database.php");
$templateParams["titolo"] = "Signup";
$templateParams["js"] = array("js/signup.js");

require("view/signup-view.php");
?>