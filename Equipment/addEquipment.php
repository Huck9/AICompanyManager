<?php
require_once("../config.php");
require_once("../uploadFiles/upload.php");
global $config;

if (!empty($_POST)) {
    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);

    $stmt = $pdo->prepare("Insert into Equipments (inventoryNumber, inventoryNumber, name,serialNumber, purchaseDate, invoiceNumber, warrantyExpiryDate, netValue, userId, notes,id) values (?, ?, ?,?, ?, ?,?,?,?,?,?)");
    $inventoryNumber = isset($_POST['inventoryNumber']) ? $_POST['inventoryNumber'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $serialNumber = isset($_POST['serialNumber']) ? $_POST['serialNumber'] : '';
    $purchaseDate = isset($_POST['purchaseDate']) ? $_POST['purchaseDate'] : '';
    $invoiceNumber = isset($_POST['invoiceNumber']) ? $_POST['invoiceNumber'] : '';
    $warrantyExpiryDate = isset($_POST['warrantyExpiryDate']) ? $_POST['warrantyExpiryDate'] : '';
    $netValue = isset($_POST['netValue']) ? $_POST['netValue'] : '';
    $userId = isset($_POST['userId']) ? $_POST['userId'] : '';
    $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    $stmt->execute([$inventoryNumber,$name,$serialNumber,$purchaseDate,$invoiceNumber,$warrantyExpiryDate,$netValue,$userId,$notes, $id]);
}

header('Location: readEquipment.php');