<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM purchaseinvoice WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
    template_header("Edit Invoice");
?>
    <div class="container">
    <div class="left"></div>
    <form method="post" action="updatePurchaseInvoice.php?id=<?=$_GET['id']?>">
        <div class="inputs">
        Numer Faktury:<input type="text" name="invoiceNumber" value="<?=$invoice['invoiceNumber']?>" class="standardInput"><br>
        Nazwa konrahenta:<input type="text" name="contractorName" value="<?=$invoice['contractorName']?>" class="standardInput"><br>
        VAT ID: <input type="text" name="vatID" value="<?=$invoice['vatID']?>" class="standardInput"><br>
        Wartość netto<input type="number" step="0.01"  name="nettoValue"  value="<?=$invoice['nettoValue']?>" class="standardInput"><br>
        Wartość VAT<input type="number" step="0.01"  name="vatValue"  value="<?=$invoice['vatValue']?>" class="standardInput"><br>
        Watrosc brutto<input type="number" step="0.01"  name="bruttoValue"  value="<?=$invoice['bruttoValue']?>" class="standardInput"><br>
        Wartość netto w innej walucie<input type="number" step="0.01"  name="nettoValueOther"  value="<?=$invoice['nettoValueOther']?>" class="standardInput"><br>
        Skrót waluty<input type="text" name="nettoOtherName"  value="<?=$invoice['nettoOtherName']?>" class="standardInput"><br>
        <input type="file" name="file" size="50" /><br>
        <input type="submit" class="submitInput">
        </div>
    </form>
        <div class="right"></div>
    </div>
<?php

}else{
    echo "Wybierz fakturę do edycji";
}
