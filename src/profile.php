<?php require_once 'homeBar.php' ?>
    <div class="col-sm-12 text-center mt-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      </svg>
    </div>
    <div class="col-sm-12 text-center mt-3">
      <?php session_start(); print_r($_SESSION["user_id"]);?>
    </div>
    <nav class="navbar navbar-expand bg-light justify-content-center">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "profilePhotos.php"){echo "active";}?>" href="profilePhotos.php">Photos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "profileEvents.php"){echo "active";}?>" href="profileEvents.php">Groups</a>
          </li>
        </ul>
    </nav>
</body>