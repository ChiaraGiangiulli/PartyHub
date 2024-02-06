<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script defer src="../js/createEvent.js"></script>
    <link href="/PartyHub/src/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand">
<div class="container">
    <div class="col-2">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link"
                    href="<?php echo $_SERVER['HTTP_REFERER'];?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){echo "active";}?>"
                    href="/PartyHub/src/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-8 text-center"><p class="p-1"><h2>New Event</h2></p></div>
    <div class="col-2"></div>
</div>
</nav>
    <div class="container-sm p-5 border">
        <form id="newEventForm">

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
                <label for="image">Cover image:</label>
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <button id="createEvent" class="btn btn-success">Create</button>
        </form>
    </div>
</body>
</html>