<!DOCTYPE html>
<?php 
foreach ($templateParams["post"] as $post){
?>
<div class="container-sm container-sm w-75 border pt-3 pb-3 mb-3 mt-3">
    <div class="row">
        <div class="col-sm-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-event" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
            <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
        </svg>
            <a href="event.php?id=<?php print_r($post['idEvento']);?>"><?php print_r($dbh->getEventFromId($post['idEvento'])[0]['Nome']);?></a>
        </div>
    </div>
    <?php if($dbh->getPostFromId($post['idPost'])[0]['Immagine'] != null){
        $image = $dbh->getPostFromId($post['idPost'])[0]['Immagine']; 
    ?>
    <img class="img-fluid" src="/PartyHub/src/img/<?php print_r($image)?>" alt="post image">
    <?php 
        } 
    ?>
    <div class="row">
        <div class="col-1">
        <button type="button" class="btn like-button" id="like" data-postid="<?php echo $post['idPost']; ?>">
            <?php
            if(count($dbh->checkLike($_SESSION['userId'], $post['idPost'])) > 0){ ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
            </svg>
            <?php } else{ ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
            </svg>
            <?php } ?>
        </button>
        </div>
        <div class="col-1">
            <div class="offcanvas offcanvas-bottom" id="comments">
                <div class="offcanvas-header">
                    <h1 class="offcanvas-title">Commenti</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body" id=offcanvasBody>
                </div>
            </div>
            <button type="button" class="btn comment-button" data-bs-toggle="offcanvas" data-bs-target="#comments" data-postid="<?php echo $post['idPost']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                </svg>
            </button>
        </div>
        <div class="col-sm-12">
            <p><?php print_r($post['Testo']) ?><p>
        </div>
    </div>
</div>
<?php }
?>