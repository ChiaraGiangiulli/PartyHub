<!DOCTYPE html>
<html lang="en">
<head>
  <title>PartyHub: <?php echo $templateParams["titolo"];?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="/PartyHub/src/css/style.css" rel="stylesheet">
  <?php 
      if(isset($templateParams["js"])):
          foreach($templateParams["js"] as $script):
    ?>
      <script defer src="<?php echo $script; ?>"></script>
    <?php
          endforeach;
      endif;
    ?>
</head>
<body>
<div id="logoMobile" class="container-sm w-50 text-center">
  <img src="img/logo.png" alt="PartyHub" class="img-fluid" title="PartyHub logo" id="logo">
</div>
<div class="container-sm p-5 border">
  <h3>Login</h3>
  <form action="/PartyHub/src/api/login.php" method="post">
    <div class="mb-3 mt-3">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="psw" required>
    </div>
    <button type="submit" class="btn btn-success">Login</button>
  </form>
</div>
<div class="container-sm pt-3 pb-3">
  <a href="/PartyHub/src/signup.php">Not a member? Signup.</a>
</div>

</body>
</html>