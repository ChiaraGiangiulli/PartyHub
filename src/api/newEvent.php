<?php require_once("../database.php");
$user = $_SESSION['userId'];
if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
else{
    $image=null;
}
if(isset($_POST['name'], $_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'])){
    if($dbh->createEvent($_POST['name'],$_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], 0, $user, $image) > 0){
        echo "evento creato con successo";
        echo "<script>window.open('../index.php','_self')</script>";
    }
    else{
        echo "impossibile creare evento";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>