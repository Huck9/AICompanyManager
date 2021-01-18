<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM Equipments WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $equipment = $stmt->fetch(PDO::FETCH_ASSOC);
    template_header("Edit Invoice");

    if (isset($_SESSION) && isset($_SESSION['name'])) {
        //echo "Current user: {$_SESSION['name']}";
        ?>
        <div class="container">
            <div class="left"></div>
            <form method="post" action="updateEquipment.php?id=<?= $_GET['id'] ?>">
                <div class="inputs">
                    Numer inwentarzowy: <input type="text" name="inventoryNumber"
                                               value="<?= $equipment['inventoryNumber'] ?>" class="standardInput"><br>
                    Nazwa: <input type="text" name="name" value="<?= $equipment['name'] ?>" class="standardInput"><br>
                    Numer seryjny: <input type="text" name="serialNumber" value="<?= $equipment['serialNumber'] ?>"
                                          class="standardInput"><br>
                    Data zakupu: <input type="date" name="purchaseDate" value="<?= $equipment['purchaseDate'] ?>"
                                        class="standardInput"><br>
                    Id faktury: <input type="text" name="invoiceNumber" value="<?= $equipment['invoiceNumber'] ?>"
                                       class="standardInput"><br>
                    Gwarancja: <input type="date" name="warrantyExpiryDate"
                                      value="<?= $equipment['warrantyExpiryDate'] ?>" class="standardInput"><br>
                    Wartość netto: <input type="number" step="0.01" name="netValue"
                                          value="<?= $equipment['netValue'] ?>" class="standardInput"><br>
                    User: <input type="text" name="userId" value="<?= $equipment['userId'] ?>"
                                 class="standardInput"><br>
                    Notatki: <input type="text" name="notes" value="<?= $equipment['notes'] ?>"
                                    class="standardInput"><br>
                    <input type="submit" class="submitInput">
                </div>
            </form>
            <div class="right"></div>
        </div>
        <?php
    } else {
        echo "No session started.";
    }
} else {
    echo "Wybierz sprzęt do edycji";
}
