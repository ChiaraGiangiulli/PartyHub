<!DOCTYPE html>
<html lang="en">
<head>
  <title>PartyHub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container p-3 bg-dark text-white">
        <div class="row">
            <div class="col">
                <div class="well">
                    <center><h1>PartyHub</h1></center>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5 border border-4 border-dark">
        <input type="text" name="username" id="user" class="form-control" placeholder="Enter username" required><br>
        <input type="password" class="form-control" placeholder="Enter password" name="pswd">
        <button type="button" class="btn btn-link float-right">Forgot password?</button>
        <br>
        <div class="d-flex justify-content-end">
            <button type="login" class="btn btn-primary mr-" >Login</button> 
            <button type="signin" class="btn btn-secondary">Signin</button>
        </div>
    </body>
    </html>