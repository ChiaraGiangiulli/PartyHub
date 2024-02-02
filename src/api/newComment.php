<?php require_once("../database.php");
$user = $_SESSION['userId'];
if(isset($_POST['comment'])){
    $mysqlTimestamp = date("Y-m-d H:i:s", time());
    $dbh->addComment($mysqlTimestamp, $_POST['comment'], $_GET['post'], $user);
    echo "<script>window.open('../index.php','_self')</script>";
}
?>