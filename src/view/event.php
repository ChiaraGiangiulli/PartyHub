<!DOCTYPE html>
<html lang="en">
<head>
    <title>PartyHub <?php echo $templateParams["titolo"]; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">
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
<nav class="navbar navbar-expand bg-light">
    <div class="col">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "home.php"){echo "active";}?> l-flex"
                href="/PartyHub/src/view/base.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>
            </a>
        </li>
    </ul>
    </div>
    <div class="col"><p class="p-1">Nome Evento</p></div>
    <div class="col"></div>
</nav>
<body>
    
</body>