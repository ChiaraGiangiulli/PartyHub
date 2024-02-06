<?php require_once("database.php");
  $event = $templateParams["evento"][0]['idEvento'] ;
  $partecipants = $dbh->getPartecipantsFromEvent($event);
?>
  
