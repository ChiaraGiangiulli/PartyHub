<?php 
include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

//effettua il login
if(isset($_POST['username'], $_POST['password'])) { 
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($dbh->checkUser($username, $password)){
       // Login eseguito
       $result["logineseguito"] = true;
    } else {
       // Login fallito
       $result["errorelogin"] = "Username e/o password errati";
    }
 } else { 
    // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
    $result["errorelogin"] = "Richiesta non valida";
 }


?>