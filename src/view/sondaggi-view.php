<?php 
foreach ($templateParams["sondaggi"] as $sondaggio){
    $opzioni = $dbh->getOpzioniFromSondaggio($sondaggio['idSondaggio']);
    $numeroVoti=0;
    ?>
<div class="row">
    <div class="col-12">
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
    <div class="col-12">
        <div class="container-sm border pt-3 pb-3">
        <table class="table table-hover">
        <?php foreach ($opzioni as $opzione){ $numeroVoti=$numeroVoti+$opzione['NumeroVoti']; }?>
            <?php foreach ($opzioni as $opzione){?>
            <thead>
                <tr>
                    <th><?php print_r($opzione['Nome'])?></th>
                    <?php if($numeroVoti > 0){ ?>
                        <th><div class="progress"> <div class="progress-bar bg-success" role="progressbar" style="width:<?php print_r(($opzione['NumeroVoti']*100)/$numeroVoti)?>%" aria-valuenow="<?php print_r(($opzione['NumeroVoti']*100)/$numeroVoti)?>" aria-valuemin="0" aria-valuemax="100"></div>
                    <?php }
                        else{ ?>
                            <th><div class="progress"> <div class="progress-bar bg-success" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php } ?>
                    
                    </div></div></th>
                </tr>
            </thead>
            <?php } ?>
        </table>
        </div>
    </div>
</div>
<?php } ?>