<?php require_once("../database.php");
$post = $_POST["postId"];
if(count($dbh->checkLike($_SESSION['userId'], $post)) > 0){
    $dbh->removeLike($_SESSION['userId'], $post);
}
else{
    $dbh->addLike($_SESSION['userId'], $post);
}
?>