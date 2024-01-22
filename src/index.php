<?php
require_once("database.php");

if(!isset($_SESSION["userId"])) {
  $templateParams["titolo"] = "Login";
  $templateParams["contenuto"] = "view/login.php";

  require("view/login.php");
} 
else {
  $templateParams["titolo"] = "Home";
  $templateParams["contenuto"] = "/view/post.php";
  $templateParams["post"] = $dbh->getFollowersPosts($user);

  require("view/base.php");
}
?>