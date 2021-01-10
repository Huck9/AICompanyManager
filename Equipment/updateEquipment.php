<?php
require_once("../config.php");
global $config;
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        $stmt = $pdo->prepare("Update Equipments set inventoryNumber = ?, name = ?,serialNumber = ?, purchaseDate = ?, invoiceNumber =?, warrantyExpiryDate =?, netValue=?, userId = ?, notes =? where id = ?");
        $inventoryNumber = isset($_POST['inventoryNumber']) ? $_POST['inventoryNumber'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $serialNumber = isset($_POST['serialNumber']) ? $_POST['serialNumber'] : '';
        $purchaseDate = isset($_POST['purchaseDate']) ? $_POST['purchaseDate'] : '';
        $invoiceNumber = isset($_POST['invoiceNumber']) ? $_POST['invoiceNumber'] : '';
        $warrantyExpiryDate = isset($_POST['warrantyExpiryDate']) ? $_POST['warrantyExpiryDate'] : '';
        $netValue = isset($_POST['netValue']) ? $_POST['netValue'] : '';
        $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
        $notes = isset($_POST['notes']) ? $_POST['notes'] : '';

        $stmt->execute([$inventoryNumber,$name,$purchaseDate,$serialNumber,$invoiceNumber,$warrantyExpiryDate,$netValue,$userId,$notes,$_GET['id']]);
       }
}
header('Location: readEquipment.php');