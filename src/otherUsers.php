<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
if($_GET['user'] != $_SESSION['userId']){
    $templateParams["js"] = array("js/otherUser.js","js/like.js", "js/comments.js");
    if(isset($_GET['contenuto'])){
        $templateParams["contenutoProfilo"] = $_GET['contenuto'];
        $templateParams["post"] = $dbh->getPostsFromUser($_GET['user']);
        $templateParams["eventi"] = $dbh->getEventFromUser($_GET['user']);
    }
require("view/otherUsers-view.php");
} else{
    $templateParams["contenuto"] = "view/profile-view.php";
    $templateParams["js"] = array("js/like.js", "js/comments.js");

require("view/base.php");
}

?>