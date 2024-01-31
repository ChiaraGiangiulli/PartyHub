<?php 

foreach ($templateParams["spese"] as $spesa){
    $prodotti = $dbh->getProdottifromLista($spesa["idLista"]);
    $evento = $dbh->getEventFromId($spesa['idEvento'])
    ?>

    <div class="col-12">
        <div class="container-sm border pt-3 pb-3">
        <table class="table">
            <?php foreach ($prodotti as $prodotto){?>
            <thead>
                <tr>
                    <th class="prod"><?php print_r($prodotto['Nome'])?></th>
                    <th class="prod"></th><th class="price"></th>
                    <th  class="price text-end"><?php print_r($prodotto['Prezzo'])?>€</th>
                    </div></div></th>
                </tr>
            </thead>
                <?php } ?>
            <thead>
                <tr>
                    <th class="tot">Total:</th>
                    <th class="tot text-end"><?php print_r($spesa['ImportoTotale'])?>€</th>
                    <th class="quota">Quota:</th>
                    <?php if($evento[0]['NumeroPartecipanti']==0) {?>
                    <th class="quota text-end"><?php print_r($spesa['Importo totale'])?>€</th>
                    <?php  }
                    else{ ?>
                    <th class="quota text-end"><?php echo number_format($spesa['ImportoTotale']/$evento[0]['NumeroPartecipanti'],2)?>€</th>
                    <?php } ?>
                </tr>
            </thead>
        </table>
        </div>
    </div>
</div>
<?php } ?>