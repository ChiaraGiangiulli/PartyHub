<?php 
require_once('../database.php');

$user = $_SESSION['userId'];

if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
else{
    $image=null;
}
if(isset($_POST['event'])){
    $res=$dbh->getEventFromName($_POST['event']);
    foreach ($res as $risultato) {
        $event= $risultato['idEvento'];
    }
    if($dbh->createPost(time(),$_POST['caption'], $image, $_GET['pers'], $user, $event) > 0){
        echo "post creato con successo";
        echo "<script>window.open('../index.php','_self')</script>";
    }
    else{
        echo "impossibile creare post";
        echo "<script>window.open('../index.php','_self')</script>";
    }
        
    
}
elseif(null !==$_GET['evnt']){
    $idEvent=$_GET['evnt'];
    if($dbh->createPost(time(),$_POST['caption'], $image, $_GET['pers'], $user, $idEvent) > 0){
        echo "post creato con successo";
        echo "<script>window.open('../eventPlanning.php?id=$idEvent','_self')</script>";
    }
    else{
        echo "impossibile creare post";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>