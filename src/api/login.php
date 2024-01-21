<?php include '../db/query.php';

$dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
if(isset($_POST['username'], $_POST['psw'])) { 
   $username = $_POST['username'];
   $password = $_POST['psw'];
   if (password_verify($password, $dbh->checkUser($username))){
      session_start();
      $_SESSION["user_id"] = $username;
      echo "<script>window.open('../../src/view/home.php','_self')</script>";
   } else {
      echo "Username e/o password errati";
   }
} else { 
   echo "Richiesta non valida";
}


?>