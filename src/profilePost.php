<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["contenutoProfilo"] = "view/profilePost-view.php";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
$templateParams["post"] = $dbh->getPostsFromUser($_GET['user']);
$templateParams["js"] = array("js/like.js", "js/comments.js", "js/notification.js", "js/manageRequest.js");
if($templateParams["profilo"][0]['Username'] == $_SESSION['userId']){
    $templateParams["contenuto"] = "view/profile-view.php";
    require("view/base.php");
}
else{ ?>
    <script>window.open('otherUsers.php?user=<?php print_r($templateParams["profilo"][0]['Username']) ?>&contenuto=<?php print_r($templateParams["contenutoProfilo"]) ?>','_self')</script>
<?php
}
?>