<?php require_once("database.php");
  $user = $templateParams["profilo"][0]['Username'];
  $followers = $dbh->getFollowers($user);
  foreach ($followers as $risultato) { ?>
  <a href="otherUsers.php?user=<?php print_r($risultato['Follower'])?>">
  <?php print_r($risultato['Follower']);?>
  </a></br><?php
  } 
?>
