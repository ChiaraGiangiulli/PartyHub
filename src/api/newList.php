<?php
    require_once('../database.php');
    $idEvent = $_GET['id'];
    $idList = $dbh->addList($idEvent);
    if(isset($_POST['products']) && isset($_POST['price'])){
        $prodotti = $_POST['products'];
        $prices = $_POST['price'];
    }
    foreach (array_map(null, $prodotti, $prices) as [$prodotto, $price]) {
        $dbh->addProductInList($prodotto, $price, $idList);
    }
    echo "<script>window.open('../eventBudget.php?id=$idEvent','_self')</script>";
?>