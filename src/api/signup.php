<?php require_once("../database.php");
if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
else{
    $image=null;
}
if(isset($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['pwd'],  $_POST['email'], $_POST['dob'])){
    $dbh->createUser($_POST['name'], $_POST['surname'], $_POST['username'], password_hash($_POST['pwd'], PASSWORD_DEFAULT), $_POST['email'], $_POST['dob'], $image);
    echo "<script>window.open('../view/succesfullSignup.php','_self')</script>";
}

?>