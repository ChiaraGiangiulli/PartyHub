<?php require_once("../database.php");
  $user = $_SESSION['userId'];
  $followers = $dbh->getFollowers($user);
  foreach ($followers as $risultato) {
      print_r($risultato['Follower']);
  } 
?>
