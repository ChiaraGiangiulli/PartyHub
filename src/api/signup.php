<?php require_once("../database.php");
$image = null;
if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
if(isset($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['pwd'],  $_POST['email'], $_POST['dob'])){
    if(count($dbh->getUserFromUsername($_POST['username'])) > 0){
        
    }else{

    }
    $dbh->createUser($_POST['name'], $_POST['surname'], $_POST['username'], password_hash($_POST['pwd'], PASSWORD_DEFAULT), $_POST['email'], $_POST['dob'], $image);
    echo "<script>window.open('../view/succesfullSignup.php','_self')</script>";
}

?>