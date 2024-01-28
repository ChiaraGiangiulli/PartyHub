<?php 
require_once("../database.php");
$idEvento = $_GET['evnt'];
$idSondaggio= $_GET['snd'];
$opzioni= $dbh->getOpzioniFromSondaggio($idSondaggio);
foreach($opzioni as $opzione){
    if(isset($_POST[$opzione['Nome']])){
        $dbh->voteSondaggio($idSondaggio,$opzione['Nome']);
    }
}
echo "<script>window.open('../eventPlanning.php?id=$idEvento','_self')</script>";
?>