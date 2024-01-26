<!DOCTYPE html>
<?php $idEvent=$_GET['id']?>
<div class="input-group">
    <form action="/PartyHub/src/api/newPost.php?pers=0&img=null&evnt=<?php echo $idEvent ?>" method="post">
    <input type="text" class="form-control" id="caption" placeholder="Join the conversation." name="caption">

    <button class="btn btn-success" type="submit">Go</button>
    </form>
    <a class="nav-link"
                href="/PartyHub/src/api/newPost.php?pers=0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                    <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
                </svg></a>
</div>
<?php 

foreach ($templateParams["sondaggi"] as $sondaggio){
?>
<p><?php echo $sondaggio['idSondaggio']?></p>
<?php }
?>
<?php 

foreach ($templateParams["post"] as $post){
?>



<div class="container-sm pt-5">
<div class="row">
        <div class="col-sm-12">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
            </svg>
            <a href="otherUsers.php?user=<?php print_r($post['Proprietario'])?>"><?php print_r($post['Proprietario']) ?></a>
        </div>
    </div>
    <div class="row">
        <img class="img-fluid" src="/PartyHub/src/img/another.jpg" alt="another img">
        <div class="col-sm-12">
                <p><?php print_r($post['Testo']) ?><p>
            </div>
        <div class="col-1">
            <div class="offcanvas offcanvas-bottom" id="demo">
                <div class="offcanvas-header">
                    <h1 class="offcanvas-title">Commenti</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <?php foreach($dbh->getPostsComments($post['idPost']) as $commento){
                    ?>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                        </svg>
                        <a href="otherUsers.php?user=<?php print_r($commento['UserCommento']);?>"><?php print_r($commento['UserCommento']);?></a>
                        :
                    <?php print_r($commento['Testo']);?>
                    </p>
                    <?php
                    }
                    ?>
                    <form action="/PartyHub/src/api/newComment.php?post=<?php print_r($post['idEvento']);?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" id="comment" placeholder="Insert you comment..." name="comment">
                            <button type="submit" class="btn btn-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <button type="button" class="btn" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                </svg>
            </button>
        </div> 
    </div>

</div>
<?php }
?>