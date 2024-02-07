<?php 
require_once('../database.php');

$user = $_SESSION['userId'];
$image=null;
if(isset($_FILES['image'])){
    $image=$_FILES['image']['name'];
    $fullPath = '../img/'.$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
}

if(isset($_POST['event'])){
    $mysqlTimestamp = date("Y-m-d H:i:s", time());
    if($_GET['pers'] != 0){
        $res=$dbh->getEventFromName($_POST['event']);
        if(count($res) > 0){
            $event= $res[0]['idEvento'];
            $dbh->createPost($mysqlTimestamp, $_POST['caption'], $image, $_GET['pers'], $user, $event);
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
        }else{
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Nessun evento corrispondente.']);
        }
    }
    else{
        $dbh->createPost($mysqlTimestamp, $_POST['caption'], $image, $_GET['pers'], $user, $_POST['event']);
    } 
}
?>