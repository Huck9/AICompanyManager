<?php

require_once("../config.php");
template_header("Add Equipment");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";
?>
    <div class="container">
        <div class="left"></div>
    <form method="post" action="addEquipment.php" enctype="multipart/form-data">
        <div class="inputs">
        Numer inwentarzowy: <input type="text" name="inventoryNumber" class="standardInput"><br>
        Nazwa: <input type="text" name="name" class="standardInput"><br>
        Numer seryjny: <input type="text" name="serialNumber" class="standardInput"><br>
        Data zakupu: <input type="date" name="purchaseDate" class="standardInput"><br>
        Id faktury: <input type="text" name="invoiceNumber" class="standardInput"><br>
        Gwarancja: <input type="date" name="warrantyExpiryDate" class="standardInput"><br>
        Wartość netto: <input type="number" step="0.01" name="netValue" class="standardInput"><br>
        User: <input type="text" name="userId" class="standardInput"><br>
        Notatki: <input type="text" name="notes" class="standardInput"><br>
        Id: <input type="text" name="id" class="standardInput"><br>
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