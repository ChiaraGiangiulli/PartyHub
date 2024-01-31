<nav class="navbar navbar-expand">
  <div class="col-12">
      <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "searchProfile.php"){echo "active";}?>" 
            href="/PartyHub/src/searchProfile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "searchEvent.php"){echo "active";}?>" 
            href="/PartyHub/src/searchEvent.php">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "searchDate.php"){echo "active";}?>" 
            href="/PartyHub/src/searchDate.php">Date</a>
        </li>
      </ul>
      </div>
</nav>