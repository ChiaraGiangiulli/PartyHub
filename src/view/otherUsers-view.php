<!DOCTYPE html>
<html lang="en">
<head>
<title>PartyHub: <?php echo $templateParams["titolo"]; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <div class="col-8 text-center"><h3><?php print_r($templateParams["profilo"][0]['Username'])?></h3></div>
    <div class="col-2"></div>
</div>
</nav>
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
<div class="col-sm-12 text-center mt-4">
  <?php print_r($dbh->getUserFromUsername($templateParams["profilo"][0]['Username'])[0]['Nome']." "
                .$dbh->getUserFromUsername($templateParams["profilo"][0]['Username'])[0]['Cognome']);?>
</div>
<div class="col-sm-12 text-center mt-4 mb-4">
  <div id="otherUsersForm" class="btn-group">
    <button id="following" type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#followingModal">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
      </svg> Following</button>
    <button id="followers" type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#followersModal">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
      </svg> Followers</button>
  </div>
  <div class="col-sm-12 text-center mt-4 mb-4">
    <?php if(count($dbh->checkFollow($_SESSION['userId'], $templateParams["profilo"][0]['Username'])) > 0){ ?>
      <button id="unfollow" type="button" class="btn btn-outline-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
      </svg> Unfollow
    </button>
    <?php
    }
    else{
    ?>
    <button id="follow" type="button" class="btn btn-outline-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
        <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
      </svg>Follow
    </button>
    <?php } ?>
</div>
</div>

<nav class="navbar navbar-expand justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if(isset($templateParams["contenutoProfilo"]) && $templateParams["contenutoProfilo"] == "view/profilePost-view.php"){echo "active";}?>" 
          href="/PartyHub/src/profilePost.php?user=<?php print_r($templateParams["profilo"][0]['Username']);?>">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(isset($templateParams["contenutoProfilo"]) && $templateParams["contenutoProfilo"] == "view/profileEvent-view.php"){echo "active";}?>" 
          href="/PartyHub/src/profileEvent.php?user=<?php print_r($templateParams["profilo"][0]['Username']);?>">Events</a>
      </li>
    </ul>
</nav>

<?php
  if(isset($templateParams["contenutoProfilo"])){
    require($templateParams["contenutoProfilo"]);
  }
?>

<?php require_once("modalsProfile.php");?>
</body>
</html>