<?php $idEvent=$_GET['id'];
?>
<div class="container mb-3 mt-3">
    <div class="row">
    <div class="col-10">
        <form id="newEventPostForm">
            <input type="text" class="form-control" id="post" placeholder="Join the conversation." name="post" title="post caption">
            <button id="addEventPost" class="btn btn-success" data-eventid="<?php echo $idEvent ?>">Post</button>
        </form>
    </div>
    <div class="col-1 text-end">
        <button id="newsurvey" type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#newSurvey">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                        <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
                    </svg>
        </button>
    </div>
    </div>
</div>



<?php include "sondaggi-view.php" ?>

<?php include "post.php"; ?>