<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
</head>
<body>
    <div class="container-sm p-5 border">
        <h2>New Post:</h2>
        <form id="signup" action="/PartyHub/src/api/newPost.php?pers=1" method="post">

            <div class="mb-3 mt-3">
                <label for="caption">Caption:</label>
                <input type="text" class="form-control" id="caption" placeholder="Caption" name="caption">
            </div>
            <div class="mb-3 mt-3">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" multiple />
            </div>
            <div class="mb-3 mt-3">
                <label for="event">Event:</label>
                <input type="text" class="form-control" id="event" placeholder="Name of the event" name="event">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</body>
</html>