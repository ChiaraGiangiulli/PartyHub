<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once("../database.php");
$user = $_SESSION['userId'];
$image = null;
if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
if(count($dbh->getEventFromName($_POST['name'])) == 0)
    if(isset($_POST['name'], $_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'])){
        $dbh->createEvent($_POST['name'],$_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], 0, $user, $image);
}
?>