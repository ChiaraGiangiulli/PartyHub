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
                        <th id="product" colspan="2" class="prod"><?php print_r($prodotto['Nome'])?></th>
                        <td headers="product" colspan="2" class="price text-end"><?php print_r($prodotto['Prezzo'])?>€</th>
                    </tr>
                </thead>
                <?php } ?>
                <tbody>
                    <tr>
                        <th id="tot" class="tot">Total:</th>
                        <td headers="tot" class="tot text-end"><?php print_r($spesa['ImportoTotale'])?>€</th>
                        <th id="quota" class="quota">Quota:</th>
                        <?php if($evento[0]['NumeroPartecipanti'] == 0) {?>
                        <td headers="quota" class="quota text-end"><?php print_r($spesa['ImportoTotale'])?>€</th>
                        <?php  }
                        else{ ?>
                        <td headers="quota" class="quota text-end"><?php echo number_format($spesa['ImportoTotale']/$evento[0]['NumeroPartecipanti'],2)?>€</th>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>