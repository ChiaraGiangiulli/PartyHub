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
<link href="/PartyHub/src/css/style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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
    <div class="col-8 text-center"><h3><?php print_r($templateParams['evento'][0]['Nome'])?></h3></div>
    <div class="col-2"></div>
</div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-4">
        <?php if($dbh->getEventFromId($templateParams['evento'][0]['idEvento'])[0]['Copertina'] != null){
            $image = $dbh->getEventFromId($templateParams['evento'][0]['idEvento'])[0]['Copertina']; 
        ?>
        <img class="img-fluid rounded" src="/PartyHub/src/img/<?php print_r($image)?>" alt="event image">
        <?php 
        } 
        else{
        ?>
        <img class="img-fluid rounded" src="/PartyHub/src/img/no_image.jpg" alt="event image">
        <?php    
        }
        ?>
        </div>
        <div class="col-8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>    
                    <?php print_r($templateParams['evento'][0]['Nome'])?>
                </li>
                <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                    <a href="otherUsers.php?user=<?php print_r($templateParams['evento'][0]['Organizzatore'])?>"><?php print_r($templateParams['evento'][0]['Organizzatore'])?></a>
                </li>
                <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-day" viewBox="0 0 16 16">
                        <path d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a2 2 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43m.094 5.093h.672V7.418h-.672z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                    <?php print_r($templateParams['evento'][0]['Data'])?>
                </li>
                <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                    <?php print_r($templateParams['evento'][0]['Citta'])?>
                </li>
                <li class="list-group-item">
                    <button id="eventPartecipants" type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#partecipantsModel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                        <?php print_r($templateParams['evento'][0]['NumeroPartecipanti'])?>
                    </button>
                </li>

                <?php if(count($dbh->isAccepted($_SESSION['userId'],$templateParams['evento'][0]['idEvento'])) > 0
                        || $templateParams['evento'][0]['Organizzatore'] == $_SESSION['userId']){ ?>    
                <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                    </svg>
                    <?php print_r($templateParams['evento'][0]['Ora'])?>
                </li>      
                <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z"/>
                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                        </svg>
                    <?php print_r($templateParams['evento'][0]['Indirizzo']); print_r(" "); print_r($templateParams['evento'][0]['NumeroCivico'])?>
                </li>
            </ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "eventPlanning.php"){echo "active";}?>" href="/PartyHub/src/eventPlanning.php?id=<?php print_r($templateParams['evento'][0]['idEvento'])?>">Planning</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "eventBudget.php"){echo "active";}?>" href="/PartyHub/src/eventBudget.php?id=<?php print_r($templateParams['evento'][0]['idEvento'])?>">Budget</a>
        </li>
    </ul>
</nav>

<?php
    if(isset($templateParams["contenutoEvent"])){
    require($templateParams["contenutoEvent"]);
    }
?>

<?php 
}
else{ ?>
            </ul>
        </div>
    </div>
</div>
    <div class="col-sm-12 text-center mt-5">
        <button type="button" data-eventid="<?php print_r($templateParams['evento'][0]['idEvento'])?>"id="requestEvent" class="btn btn-outline-secondary">Request to join</button>
    </div>
<?php }
?>
<?php require_once("modalsEvent.php");?>
</body>
</html>
