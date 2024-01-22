<?php 
require_once('../database.php');

$user = $_SESSION['userId'];

if($_POST['image'] == ""){
    $image=null;
}
else{
    $image=$_POST['image'];
}
if(isset($_POST['event'])){
    $res=$dbh->getEventFromName($_POST['event']);
    foreach ($res as $risultato) {
        $event= $risultato['idEvento'];
    }
    if($dbh->createPost(time(),$_POST['caption'], $image, 1, $user, $event[0]) > 0){
        echo "post creato con successo";
        echo "<script>window.open('../index.php','_self')</script>";
    }
    else{
        echo "impossibile creare post";
        echo "<script>window.open('../index.php','_self')</script>";
    }
        
    
}
else{
    echo "evento?";
}
?>