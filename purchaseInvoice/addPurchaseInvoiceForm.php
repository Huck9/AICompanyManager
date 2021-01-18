<?php

require_once("../config.php");
template_header("Add Invoice");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";

?>
    <div class="container">
        <div class="left"></div>
    <form method="post" action="addPurchaseInvoice.php" enctype="multipart/form-data">
        <div class="inputs">
            Numer Faktury: <input type="text" name="invoiceNumber" class="standardInput"><br>
            Nazwa konrahenta: <input type="text" name="contractorName" class="standardInput"><br>
            VAT ID: <input type="text" name="vatID" class="standardInput"><br>
            Wartość netto: <input type="number" step="0.01" name="nettoValue" class="standardInput"><br>
            Wartość VAT: <input type="number" step="0.01" name="vatValue" class="standardInput"><br>
            Watrosc brutto: <input type="number" step="0.01" name="bruttoValue" class="standardInput"><br>
            Wartość netto w innej walucie: <input type="number" step="0.01" name="nettoValueOther"
                                                  class="standardInput"><br>
            Skrót waluty: <input type="text" name="nettoOtherName" class="standardInput"><br>
            Data faktury: <input type="date" name="date" class="standardInput"><br>
            <input type="file" name="file" size="50"><br>
            <input type="submit" class="submitInput">
        </div>
    </form>
    <div class="right"></div>
</div>
<?php
template_footer();
} else {
    echo "No session started.";
}
