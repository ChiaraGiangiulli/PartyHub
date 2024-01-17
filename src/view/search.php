<?php require_once 'homeBar.php' ?>

    <nav class="navbar navbar-expand bg-light justify-content-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "searchProfile.php"){echo "active";}?>" href="searchProfile.php">Profile</a>
            </li>
           <li class="nav-item">
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "searchEvent.php"){echo "active";}?>" href="searchEvent.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "searchDate.php"){echo "active";}?>" href="searchDate.php">Date</a>
            </li>
          </ul>
    </nav>