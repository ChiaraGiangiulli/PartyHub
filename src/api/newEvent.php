<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once("../database.php");
$user = $_SESSION['userId'];
$image = null;
if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}
if($dbh->getEventFromName($_POST['name'])){ ?>
    <h5> Questo evento esiste già, scegli un altro nome</h5>
    <div class="col-sm">
        <a href="../view/createEvent.php" class="btn btn-light">Cambia nome</a>
    </div>
    
<?php }
else if(isset($_POST['name'], $_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'])){
    if($dbh->createEvent($_POST['name'],$_POST['address'], $_POST['number'], $_POST['city'], $_POST['country'], $_POST['date'], $_POST['time'], 0, $user, $image) > 0){ ?>
       <h5> Evento creato con successo</h5>
        <div class="col-sm">
            <a href="../profile.php" class="btn btn-light">Torna al profilo</a>
        </div>
        
    <?php
    }
    else{ ?>
        <h5> Impossibile creare evento</h5>
        <div class="col-sm">
            <a href="../view/createEvent.php" class="btn btn-light">Riprova</a>
        </div>
    <?php
    }
}
?>