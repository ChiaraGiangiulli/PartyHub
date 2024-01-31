<div class="col-sm-12 text-end pe-1 pt-2">
  <a href="/PartyHub/src/api/logout.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
    </svg>
  </a>
</div>
<div class="col-sm-12 text-center mt-4">
<?php if($dbh->getUserFromUsername($templateParams["profilo"][0]['Username'])[0]['ImmagineProfilo'] != null){
    $image = $dbh->getUserFromUsername($templateParams["profilo"][0]['Username'])[0]['ImmagineProfilo']; 
?>
<img class="img w-25 h-25 rounded" src="/PartyHub/src/img/<?php print_r($image)?>" alt="profile image">
<?php 
  } 
  else{
?>
<img class="img w-25 h-25 rounded" src="/PartyHub/src/img/no_profile_picture.jpg" alt="profile image">
<?php    
  }
?>
</div>
<div class="col-sm-12 text-center mt-3">
  <h3><?php print_r($templateParams["profilo"][0]['Username']);?></h3>
</div>
<div class="col-sm-12 text-center mt-4 mb-4">
  <div id="profileForm" class="btn-group">
    <button id="following" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#followingModal">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
      </svg> Following</button>
    <button id="followers" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#followersModal">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
      </svg> Followers</button>
      <a id="newEvent" type="button" class="btn btn-outline-success" href="/PartyHub/src/view/createEvent.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-plus" viewBox="0 0 16 16">
          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
          <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8"/>
        </svg> New Event</a>
  </div>
</div>

<nav class="navbar navbar-expand justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "/PartyHub/src/profilePost.php"){echo "active";}?>" href="/PartyHub/src/profilePost.php?user=<?php print_r($templateParams["profilo"][0]['Username']);?>">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "/PartyHub/src/profileEvent.php"){echo "active";}?>" href="/PartyHub/src/profileEvent.php?user=<?php print_r($templateParams["profilo"][0]['Username']);?>">Events</a>
      </li>
    </ul>
</nav>

