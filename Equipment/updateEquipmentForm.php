<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM Equipments WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $equipment = $stmt->fetch(PDO::FETCH_ASSOC);
    template_header("Edit Invoice");
?>
    <div class="container">
    <div class="left"></div>
    <form method="post" action="updateEquipment.php?id=<?=$_GET['id']?>">
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
        <input type="submit" class="submitInput">
        </div>
    </form>
        <div class="right"></div>
    </div>
<?php

}else{
    echo "Wybierz sprzęt do edycji";
}
