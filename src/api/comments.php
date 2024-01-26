<?php require_once("../database.php");
if(isset($_POST["postId"])){
    $post = $_POST["postId"]; 
    $result = $dbh->getPostsComments($post);
    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
