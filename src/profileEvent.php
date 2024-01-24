<?php
require_once("database.php");
$templateParams["titolo"] = "Profile";
$templateParams["profilo"] = $dbh->getUserFromUsername($_GET['user']);
$templateParams["contenutoProfilo"] = "view/profileEvent-view.php";
$templateParams["eventi"] = $dbh->getEventFromUser($_GET['user']);
if($templateParams["profilo"][0]['Username'] == $_SESSION['userId']){
    $templateParams["contenuto"] = "view/profile-view.php";
    require("view/base.php");
}
else{ ?>
    <script>
    window.open('otherUsers.php?user=<?php print_r($templateParams["profilo"][0]['Username']) ?>&contenuto=<?php print_r($templateParams["contenutoProfilo"]) ?>','_self')
    </script>
<?php
}
?>