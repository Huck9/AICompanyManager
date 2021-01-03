<?php
require_once("../config.php");
template_header("Add Invoice");
?>
    <form method="post" action="addPurchaseInvoice.php">
        Numer Faktury:<input type="text" name="invoiceNumber"><br>
        Nazwa konrahenta:<input type="text" name="contractorName"><br>
        VAT ID: <input type="text" name="vatID"><br>
        Wartość netto<input type="number" step="0.01" name="nettoValue"><br>
        Wartość VAT<input type="number" step="0.01" name="vatValue"><br>
        Watrosc brutto<input type="number" step="0.01" name="bruttoValue"><br>
        Wartość netto w innej walucie<input type="number" step="0.01" name="nettoValueOther"><br>
        Skrót waluty<input type="text" name="nettoOtherName"><br>
        <input type="file" name="file" size="50" /><br>
        <input type="submit">
    </form>
<?php
template_footer();
