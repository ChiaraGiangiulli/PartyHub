<?php require_once("../database.php");
$user = $_SESSION['userId'];
$image = null;
if(isset($_FILES['image'])){
    $image=$_FILES['image']['name'];
    $fullPath = '../img/'.$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
}
if(count($dbh->getEventFromName($_POST['name'])) == 0){ //non esistono eventi con lo stesso nome
    if(isset($_POST['name'], $_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'])){
            $idEvent=$dbh->createEvent($_POST['name'],$_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], 1, $user, $image);
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'id' => $idEvent]);
    }
}
else{
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message'=>"Name already in use"]);
}
?>