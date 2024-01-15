<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container p-3">
        <div class="row">
            <div class="col">
                <div class="well">
                    <center><h1>PartyHub</h1></center>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5 border border-4">
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required><br>
        <input type="text" name="surname" id="surname" class="form-control" placeholder="Enter surname" required><br>
        <input type="text" name="username" id="user" class="form-control" placeholder="Enter username" required><br>
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" required><br>
        <input type="password" class="form-control" placeholder="Enter password" name="pswd"><br>
        <input type="password" class="form-control" placeholder="Enter password" name="pswd"><br>
        <input type="date" id="dataInput" name="data" required>
        <div class="d-flex justify-content-end">
        <form method="post" action="">
                <button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button></br></br>
                <?php
                    if(isset($_POST['signup']))
                        echo "<script>window.open('home.php','_self')</script>"
                ?>
            </form>
        </div>
    </body>
    </html>