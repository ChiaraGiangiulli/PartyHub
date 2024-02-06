<?php require_once("../database.php");
    if(isset($_POST["postId"])){
        $post = $_POST["postId"]; 
        print_r($post);
        $dbh->deletePost($post);
    }
?>