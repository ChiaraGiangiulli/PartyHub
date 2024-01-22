<?php
require_once("database.php");

if(!isset($_SESSION["userId"])) {
  $templateParams["titolo"] = "Login";
  $templateParams["contenuto"] = "view/login-view.php";

  require("view/login-view.php");
} 
else {
  $templateParams["titolo"] = "Home";
  $templateParams["contenuto"] = "view/post.php";
  $templateParams["post"] = $dbh->getFollowersPosts($_SESSION["userId"]);

  require("view/base.php");
}
?>