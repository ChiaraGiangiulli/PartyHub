<?php require_once("database.php");
  $user = $templateParams["profilo"][0]['Username'];
  $followers = $dbh->getFollowers($user);
  foreach ($followers as $risultato) {
      print_r($risultato['Follower']);?></br>
<?php
  } 
?>
