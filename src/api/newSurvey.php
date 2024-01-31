<?php
    require_once('../database.php');
    $idEvent = $_GET['id'];
    $idSondaggio = $dbh->addSurvey($idEvent);
    if(isset($_POST['choices'])){
        $opzioni = $_POST['choices'];
    }
    foreach($opzioni as $opzione){
        $dbh->addOptionInSurvey($idSondaggio,$opzione);
    }
    echo "<script>window.open('../eventPlanning.php?id=$idEvent','_self')</script>";
?>