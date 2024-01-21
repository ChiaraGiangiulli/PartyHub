<?php include '../db/query.php';
  
  $dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
  $user = $_SESSION['user_id'];
  $followers = $dbh->getFollowers($user);
  foreach ($followers as $risultato) {
      print_r($risultato['Follower']);
  } 
?>
