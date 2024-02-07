<?php require_once("../database.php");
$image = null;
if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
if(isset($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['password'],  $_POST['email'], $_POST['dateofbirth'])){
    if(count($dbh->getUserFromUsername($_POST['username'])) > 0){
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message'=>"Username already used!"]);
        
    }else{
        $dbh->createUser($_POST['name'], $_POST['surname'], $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email'], $_POST['dateofbirth'], $image);
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    }
    
}

?>