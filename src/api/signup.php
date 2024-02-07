<?php require_once("../database.php");
$image = null;
if(isset($_FILES['image'])){
    $image=$_FILES['image']['name'];
    $fullPath = '../img/'.$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
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