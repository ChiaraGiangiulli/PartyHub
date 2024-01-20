<?php 
include '../db/query.php';
require_once '../view/profile.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$user = $_SESSION["user_id"];
$res = $dbh->getPostsFromUser($user);
$i=0;
foreach ($res as $risultato) {
    $posts[$i]['Testo']=$risultato['Testo'];
    $posts[$i]['Immagine']=$risultato['Immagine'];
    $posts[$i]['Proprietario']=$risultato['Proprietario'];
    $posts[$i]['Evento']=$dbh->getEventFromId($risultato['idEvento'])[0]['Nome'];
    $i=$i+1;
}   


?>