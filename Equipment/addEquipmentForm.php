<?php
require_once("../config.php");
template_header("Add Equipment");
?>
    <form method="post" action="addEquipment.php" enctype="multipart/form-data">
        Numer inwentarzowy:<input type="text" name="inventoryNumber"><br>
        Nazwa<input type="text" name="name"><br>
        Numer seryjny<input type="text" name="serialNumber"><br>
        Data zakupu<input type="date" name="purchaseDate"><br>
        Id faktury: <input type="text" name="invoiceNumber"><br>
        Gwarancja<input type="date" name="warrantyExpiryDate"><br>
        Wartość netto<input type="number" step="0.01" name="netValue"><br>
        User<input type="text" name="userId"><br>
        Notatki<input type="text" name="notes"><br>
        Id<input type="text" name="id"><br>
        <input type="submit">
    </form>
<?php
template_footer();