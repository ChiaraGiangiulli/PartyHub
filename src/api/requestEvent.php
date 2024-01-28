<?php require_once("../database.php");
$idEvento = $_POST['event'];
$evento = $dbh->getEventFromId($idEvento)[0];
$testo = "vuole partecipare al tuo evento: ".$evento['Nome'];
$idNotifica = $dbh->newNotification("Richiesta Partecipazione Evento", $testo, $_SESSION['userId'], $evento['Organizzatore'], null);
$dbh->newRequest($_SESSION['userId'], $idEvento, $idNotifica);
?>