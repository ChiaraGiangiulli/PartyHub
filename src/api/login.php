<?php 
include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

//effettua il login
if(isset($_POST['username'], $_POST['psw'])) { 
    $username = $_POST['username'];
    $password = $_POST['psw'];
    if ($dbh->checkUser($username, $password)){
       // Login eseguito
       echo "<script>window.open('../../src/home.php','_self')</script>";
    } else {
       // Login fallito
       echo "Username e/o password errati";
    }
 } else { 
    // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
    echo "Richiesta non valida";
 }


?>