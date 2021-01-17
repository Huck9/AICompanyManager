<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM salesInvoice WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
    template_header("Detail Invoice");
    ?>
    <div class="container">
        <div class="left"></div>

            <div class="details">
                Numer Faktury: <?=$invoice['invoiceNumber']?><br>
                Nazwa konrahenta: <?=$invoice['contractorName']?><br>
                VAT ID: <?=$invoice['vatID']?><br>
                Wartość netto: <?=$invoice['nettoValue']?><br>
                Wartość VAT: <?=$invoice['vatValue']?><br>
                Watrosc brutto: <?=$invoice['bruttoValue']?><br>
                Data faktury: <?=$invoice['date']?><br>
                Wartość netto w innej walucie: <?=$invoice['nettoValueOther']?><br>
                Skrót waluty: <?=$invoice['nettoOtherName']?><br>
                Nazwa pliku:

                <a href="../uploadFiles/uploads/<?= $invoice['filename'] ?>"><?= $invoice['filename'] ?></a><br>
            <button><a href="readSalesInvoice.php"> Powrót do faktur</a></button>
            </div>
    <div class="right"></div>
    </div>
    <?php

}else{
    echo "Wybierz fakturę do edycji";
}
