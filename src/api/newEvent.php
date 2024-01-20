<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

session_start();
$user = $_SESSION['user_id'];
if(isset($_POST['name'], $_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], $_POST['image'])){
    if($dbh->createEvent($_POST['name'],$_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], 0, $user, $_POST['image']) > 0){
        echo "evento creato con successo";
        echo "<script>window.open('../view/profile.php','_self')</script>";
    }
    else{
        echo "impossibile creare evento";
        echo "<script>window.open('../view/createEvent.php','_self')</script>";
    }
        
    
}
?>