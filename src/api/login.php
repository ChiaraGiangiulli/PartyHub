<?php 
require_once("../database.php");

if(isset($_POST['username'], $_POST['psw'])) { 
   $username = $_POST['username'];
   $password = $_POST['psw'];
   if (password_verify($password, $dbh->checkUser($username))){
      $_SESSION["userId"] = $username;
   } else {
      echo "Username e/o password errati";
   }
} else { 
   echo "Richiesta non valida";
}
echo "<script>window.open('../index.php','_self')</script>";


?>