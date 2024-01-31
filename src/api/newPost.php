<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php 
require_once('../database.php');

$user = $_SESSION['userId'];
$image=null;

if(isset($_POST['image'])){
    if($_POST['image'] != ""){
        $image=$_POST['image'];
    }
}

if(isset($_POST['event'])){
    $res=$dbh->getEventFromName($_POST['event']);
    if(count($res) > 0){
        $event= $res[0]['idEvento'];
        if($dbh->createPost(time(),$_POST['caption'], $image, 1, $user, $event) > 0){ ?>
            <h5> Post creato con successo</h5>
            <div class="col-sm">
                <a href="../index.php" class="btn btn-light">Torna alla home</a>
            </div>
            
        <?php
        }
        else{ ?>
            <h5> Impossibile creare post</h5>
            <div class="col-sm">
               <a href="../view/addPost.php" class="btn btn-light">Riprova</a> 
            </div>
            
        <?php
        }
    }
    else{ ?>
        <h5> Nessun evento corrispondente</h5>
        <div class="col-sm">
          <a href="../view/addPost.php" class="btn btn-light">Cambia evento</a>      
        </div>
        
    <?php
    } 
}
else if(null !==$_GET['evnt']){
    $idEvent=$_GET['evnt'];
    if($dbh->createPost(time(),$_POST['caption'], $image, $_GET['pers'], $user, $idEvent) > 0){ ?>
        <h5> Post creato con successo</h5> 
        <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-light">Torna sull'evento</a>
    <?php
    }
    else{?>
        <h5> Impossibile creare post<h5>
        <div class="col-sm">
           <a href="../view/addPost.php" class="btn btn-light">Riprova</a>     
        </div>
        
    <?php
    }
}
?>