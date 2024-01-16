<?php 
include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);

print_r($_POST);
//effettua il login
if(isset($_POST['username'], $_POST['psw'])) { 
    echo "bo";
    $username = $_POST['username'];
    $password = $_POST['psw'];
    if ($dbh->checkUser($username, $password)){
       // Login eseguito
       echo "ye";
    } else {
       // Login fallito
       echo "Username e/o password errati";
    }
 } else { 
    // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
    echo "Richiesta non valida";
 }


?>