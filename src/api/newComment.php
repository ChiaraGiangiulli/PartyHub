<?php require_once("../database.php");
$user = $_SESSION['userId'];
if(isset($_POST['comment'])){
    $dbh->addComment(time(), $_POST['comment'], $_GET['post'], $user);
    echo "<script>window.open('../index.php','_self')</script>";
}
?>