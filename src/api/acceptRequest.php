<?php require_once("../database.php");
$idNotifica = $_POST['notification'];
$richiesta = $dbh->requestFromNotification($idNotifica)[0];
$dbh->requestAccepted($richiesta['UserPartecipante'], $richiesta['idEvento']);
$testo = "ha accettato la tua richiesta di partecipazione all'evento: ".$dbh->getEventFromId($richiesta['idEvento'])[0]['Nome'];
$dbh->newNotification("Richiesta Accettata", $testo, $_SESSION['userId'], $richiesta['UserPartecipante'], null);
?>