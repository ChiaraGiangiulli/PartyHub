<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
    <div id="logoMobile" class="text-center">
        <a href="./index.php">
        <img src="img/logo.png" alt="PartyHub" class="img w-50" title="PartyHub logo" id="logo">
        </a>
    </div>
    <div class="container-sm p-5 border">
        
        <h2>Signup</h2>
        <form id="signup" enctype="multipart/form-data">

            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
            </div>
            <div class="mb-3 mt-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            </div>
            <div class="mb-3">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
            </div>
            <div class="mb-3">
                <label for="rpwd">Confirm Password:</label>
                <input type="password" class="form-control" id="rpwd" placeholder="Confirm password" name="rpwd">
            </div>
            <div class="mb-3 mt-3">
                <label for="image">Profile image:</label>
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <button id="signupButton" class="btn btn-success">Signup</button>
        </form>
    </div>
</body>
</html>