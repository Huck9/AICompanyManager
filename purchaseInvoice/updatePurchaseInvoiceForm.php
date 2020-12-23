<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM purchaseinvoice WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <form method="post" action="updatePurchaseInvoice.php?id=<?=$_GET['id']?>">
        Numer Faktury:<input type="text" name="invoiceNumber" value="<?=$invoice['invoiceNumber']?>"><br>
        Nazwa konrahenta:<input type="text" name="contractorName" value="<?=$invoice['contractorName']?>"><br>
        VAT ID: <input type="text" name="vatID" value="<?=$invoice['vatID']?>"><br>
        Wartość netto<input type="number" name="nettoValue"  value="<?=$invoice['nettoValue']?>"><br>
        Wartość VAT<input type="number" name="vatValue"  value="<?=$invoice['vatValue']?>"><br>
        Watrosc brutto<input type="number" name="bruttoValue"  value="<?=$invoice['bruttoValue']?>"><br>
        Wartość netto w innej walucie<input type="number" name="nettoValueOther"  value="<?=$invoice['nettoValueOther']?>"><br>
        Skrót waluty<input type="text" name="nettoOtherName"  value="<?=$invoice['nettoOtherName']?>"><br>
        <input type="file" name="file" size="50" /><br>
        <input type="submit">
    </form>
<?php

}else{
    echo "Wybierz fakturę do edycji";
}
