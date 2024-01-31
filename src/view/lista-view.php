<?php 
foreach ($templateParams["spese"] as $spesa){
    $prodotti = $dbh->getProdottifromLista($spesa["idLista"]);
    ?>

    <div class="col-12">
        <div class="container-sm border pt-3 pb-3">
        <table class="table table-hover">
            <?php foreach ($prodotti as $prodotto){?>
            <thead>
                <tr>
                    <th><?php print_r($prodotto['Nome'])?></th>
                    <th><?php print_r($prodotto['Prezzo'])?>€</th>
                    </div></div></th>
                </tr>
            </thead>
            <?php } ?>
        </table>
        </div>
    </div>
</div>
<?php } ?>