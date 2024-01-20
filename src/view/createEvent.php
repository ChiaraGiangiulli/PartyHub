<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
</head>
<body>
    <div class="container-sm p-5 border">
        <h2>New Event</h2>
        <form id="signup" action="/PartyHub/src/api/newEvent.php" method="post">

            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="number">N°:</label>
                <input type="number" class="form-control" id="number" placeholder="Number" name="number" required>
            </div>
            <div class="mb-3">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" placeholder="Country" name="country" required>
            </div>
            <div class="mb-3">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="image">Image:</label>
                <input type="text" class="form-control" id="image" placeholder="Address" name="image">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</body>
</html>