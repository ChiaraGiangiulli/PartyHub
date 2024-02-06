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
<nav class="navbar navbar-expand">
  <div class="col">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link"
                href="/PartyHub/src/view/addPost-view.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg></a>
          </li>
      </ul>
    </div>
    <div class="col">
      <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){echo "active";}?>"
            href="/PartyHub/src/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
              <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "search.php"){echo "active";}?>" 
            href="/PartyHub/src/search.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "profile.php"){echo "active";}?>" 
            href="/PartyHub/src/profile.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg></a>
        </li>
      </ul>
    </div>
    <div class="col">
      <ul class="navbar-nav justify-content-end">
          <li class="nav-item">
              <button class="btn" id="notificationButton" type="button" data-bs-toggle="offcanvas" data-bs-target="#notification">
                <?php 
                    $count = 0;
                    foreach($dbh->getNotificationsFromUser($_SESSION['userId']) as $notification){
                      if($notification['Vista'] == false){
                        $count = $count + 1;
                      }
                  }
                  if($count > 0){ ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="red" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                    </svg>
                  <?php
                  } ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                </svg>
              </button>
          </li>
      </ul> 
    </div>            
</nav>



<?php
    require($templateParams["contenuto"]);
?>


<?php
  if(isset($templateParams["contenutoProfilo"])){
    require($templateParams["contenutoProfilo"]);
  }
?>


<?php
  if(isset($templateParams["contenutoSearch"])){
    require($templateParams["contenutoSearch"]);
  }
?>

<?php
  if(isset($templateParams["risultatoSearchEvent"])){
    foreach($templateParams["risultatoSearchEvent"] as $event){ ?>
    <ul>
      <li>
      <a href="event.php?id=<?php print_r($event['idEvento'])?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-event" viewBox="0 0 16 16">
          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
          <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
      </svg>
      <?php print_r($event['Nome']); ?></a>
      </li>
    </ul>
    <?php  
    }
  }
  if(isset($templateParams["risultatoSearchProfile"])){  
    foreach($templateParams["risultatoSearchProfile"] as $profile){ ?>
    <ul>
      <li>
      <a href="otherUsers.php?user=<?php print_r($profile['Username'])?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
      </svg>
      <?php print_r($profile['Username']); ?></a>
      </li>
    </ul>
      
    <?php
    }
  }
?>
<div class="offcanvas offcanvas-end" id="notification">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title">Notifiche</h3>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <?php 
    foreach($dbh->getNotificationsFromUser($_SESSION['userId']) as $notification){ ?>
    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
        </svg>
        <a href="otherUsers.php?user=<?php print_r($notification['UserInvio'])?>"><?php print_r($notification['UserInvio'])?></a>
                    : <?php print_r($notification['Testo']); 
        if($notification['Tipo'] == "Richiesta Partecipazione Evento" && 
            (count($dbh->requestFromNotification($notification['idNotifica'])) > 0 
              && $dbh->requestFromNotification($notification['idNotifica'])[0]['Accettata'] == false)){ ?>
          <div class="col-sm-6 text-center mb-1">
              <button type="button" id="accept" data-notificationid="<?php print_r($notification['idNotifica']) ?>" class="btn btn-outline-secondary">Accept</button>
          </div>
          <div class="col-sm-6 text-center mb-1">
              <button type="button" id="deny" data-notificationid="<?php print_r($notification['idNotifica']) ?>" class="btn btn-outline-secondary">Deny</button>
          </div>
      <?php } ?>
    <?php } ?>
  </div>
</div>
<?php require_once("modalsProfile.php");?>
</body> 
</html>
