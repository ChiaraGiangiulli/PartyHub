<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

session_start();
$user = $_SESSION['user_id'];
print_r($_POST);
if(isset($_POST['name'], $_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'])){
    print_r($dbh->createEvent($_POST['name'],$_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], 0, $user, null));
        
    
}
?>