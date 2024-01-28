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
  $templateParams["post"] = $dbh->getFollowingPosts($_SESSION["userId"]);
  $templateParams["js"] = array("js/like.js", "js/comments.js", "js/notification.js", "js/manageRequest.js");

  require("view/base.php");
}
?>