<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
$templateParams["js"] = array("js/otherUser.js");
if(isset($_GET['contenuto'])){
    $templateParams["contenutoProfilo"] = $_GET['contenuto'];
    $templateParams["post"] = $dbh->getPostsFromUser($_GET['user']);
    $templateParams["eventi"] = $dbh->getPostsFromUser($_GET['user']);
}
require("view/otherUsers-view.php");
?>