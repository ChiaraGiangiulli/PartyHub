<!DOCTYPE html>
<?php 

foreach ($templateParams["eventi"] as $event){
?>
<div class="container pt-3 pb-3 mb-3 mt-3">
        <div class="card" style="width:50%">
            <?php if($dbh->getEventFromId($event['idEvento'])[0]['Copertina'] != null){
                $image = $dbh->getEventFromId($event['idEvento'])[0]['Copertina']; 
            ?>
            <img class="card-img-top rounded" src="/PartyHub/src/img/<?php print_r($image)?>" alt="event image">
            <?php 
            } 
            ?>
            <div class="card-body">
            <h4 class="card-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-event" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <?php print_r($dbh->getEventFromId($event['idEvento'])[0]['Nome']);?></h4>
            <a href="event.php?id=<?php print_r($event['idEvento']);?>" class="btn btn-light">See Event</a>
            </div>
        </div> 
</div>
<?php }
?>