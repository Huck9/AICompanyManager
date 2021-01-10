<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM Equipments WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $equipment = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <form method="post" action="updateEquipment.php?id=<?=$_GET['id']?>">
        Numer inwentarzowy:<input type="text" name="inventoryNumber"><br>
        Nazwa<input type="text" name="name"><br>
        Numer seryjny<input type="text" name="serialNumber"><br>
        Data zakupu<input type="date" name="purchaseDate"><br>
        Id faktury: <input type="text" name="invoiceNumber"><br>
        Gwarancja<input type="date" name="warrantyExpiryDate"><br>
        Wartość netto<input type="number" step="0.01" name="netValue"><br>
        User<input type="text" name="userId"><br>
        Notatki<input type="text" name="notes"><br>
        <input type="submit">
    </form>
<?php

}else{
    echo "Wybierz sprzęt do edycji";
}
