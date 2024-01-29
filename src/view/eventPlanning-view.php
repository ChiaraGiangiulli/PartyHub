<?php $idEvent=$_GET['id'];
?>
<div class="input-group">
    <form action="/PartyHub/src/api/newPost.php?pers=0&img=null&evnt=<?php echo $idEvent ?>" method="post">
        <input type="text" class="form-control" id="caption" placeholder="Join the conversation." name="caption">
        <button class="btn btn-success" type="submit">Post</button>
    </form>
    <button id="newsurvey" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newSurvey">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                    <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
                </svg></button>
</div>

<?php 
foreach ($templateParams["sondaggi"] as $sondaggio){
    $opzioni = $dbh->getOpzioniFromSondaggio($sondaggio);
    $numeroVoti=0;
    ?>
<div class="row">
    <div class="col-6">
        <div class="container-sm border pt-3 pb-3">
            <form action="../src/api/voteSurvey.php?evnt=<?php echo $idEvent?>&snd=<?php echo $sondaggio['idSondaggio']?>" method="post">
                <form action="form-check">
                    <?php foreach ($opzioni as $opzione){?>
                        <input class="form-check-input" type="checkbox" id="<?php print_r($opzione['Nome'])?>" name="<?php print_r($opzione['Nome'])?>" value="<?php print_r($opzione['Nome'])?>">
                        <label class="form-check-label"><?php print_r($opzione['Nome']) ?></label>
                        <br>
                    <?php
                        } ?>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="container-sm border pt-3 pb-3">
        <table class="table table-hover">
        <?php foreach ($opzioni as $opzione){ $numeroVoti=$numeroVoti+$opzione['NumeroVoti']; }?>
            <?php foreach ($opzioni as $opzione){?>
            <thead>
                <tr>
                    <th><?php print_r($opzione['Nome'])?></th>
                    <th><div class="progress"> <div class="progress-bar bg-success" role="progressbar" style="width:<?php print_r(($opzione['NumeroVoti']*100)/$numeroVoti)?>%" aria-valuenow="<?php print_r(($opzione['NumeroVoti']*100)/$numeroVoti)?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></div></th>
                </tr>
            </thead>
            <?php } ?>
        </table>
        </div>
    </div>
</div>
<?php } ?>

<?php include "post.php"; ?>