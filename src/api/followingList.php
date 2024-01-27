<?php require_once("database.php");
    $user = $templateParams["profilo"][0]['Username'];
    $following = $dbh->getFollowing($user);
    foreach ($following as $risultato) { ?>
    <a href="otherUsers.php?user=<?php print_r($risultato['Following'])?>">
    <?php print_r($risultato['Following']);?>
    </a></br><?php
    }
?>