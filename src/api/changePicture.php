<?php require_once("../database.php");
    $image = $_POST['image'];
    $username = $_SESSION['userId'];
    $dbh->editProfilePicture($username, $image);

    echo "<script>window.open('../profile.php','_self')</script>";
?>