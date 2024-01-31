<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php 
require_once('../database.php');

$user = $_SESSION['userId'];
$image=null;

if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}

if(isset($_POST['event'])){
    if($_GET['pers'] != 0){
        $res=$dbh->getEventFromName($_POST['event']);
        if(count($res) > 0){
            $event= $res[0]['idEvento'];
            $dbh->createPost(time(),$_POST['caption'], $image, $_GET['pers'], $user, $event);
        }
    }
    else{
        $dbh->createPost(time(),$_POST['caption'], $image, $_GET['pers'], $user, $_POST['event']);
    }
    
}
?>