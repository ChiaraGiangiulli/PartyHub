<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
session_start();
$user = $_SESSION["user_id"];
$res = $dbh->getFollowersPosts($user);
$i=0;
foreach ($res as $risultato) {
    $posts[$i]['Testo']=$risultato['Testo'];
    $posts[$i]['Immagine']=$risultato['Immagine'];
    $posts[$i]['Proprietario']=$risultato['Proprietario'];
    $posts[$i]['Evento']=$dbh->getEventFromId($risultato['idEvento'])[$i]['Nome'];
    $i=$i+1;
}   

?>