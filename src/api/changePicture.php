<?php require_once("../database.php");
    $image = $_FILES['image'];
    $username = $_SESSION['userId'];
    $dbh->editProfilePicture($username, $image['name']);
    $fullPath = '../img/'.$image['name'];
    move_uploaded_file($image['tmp_name'], $fullPath);
    echo "<script>window.open('../profile.php','_self')</script>";
?>