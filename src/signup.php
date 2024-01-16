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
<div class="container">
    <h1>PartyHub</h1>
    <h2>Signup</h2>
    <form action="/PartyHub/src/processSignup.php" method="post">

    </div>
    <div class="mb-3 mt-3">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="Name">Surname:</label>
        <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="Username">Username:</label>
        <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="dob">Date of Birth:</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
    </div>
    <div class="mb-3">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="pwd" required>
    </div>
    <button type="submit" class="btn btn-success">Signup</button>
</form>
</div>

</body>
</html>