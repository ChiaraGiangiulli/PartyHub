<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

session_start();
$user = $_SESSION['user_id'];
print_r($_POST);
if($_POST['image'] == ""){
    $image=null;
}
else{
    $image=$_POST['image'];
}
if(isset($_POST['event'])){
    $res=$dbh->getEventFromName($_POST['event']);
    foreach ($res as $risultato) {
        $event= $risultato['idEvento'];
    }
    if($dbh->createPost(time(),$_POST['caption'], $image, 1, $user, $event) > 0){
        echo "post creato con successo";
        echo "<script>window.open('../view/home.php','_self')</script>";
    }
    else{
        echo "impossibile creare post";
        echo "<script>window.open('../view/addPost.php','_self')</script>";
    }
        
    
}
else{
    echo "evento?";
}
?>