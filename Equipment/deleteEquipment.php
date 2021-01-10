<?php
require_once("../config.php");
global $config;
if (isset($_GET['id'])) {

    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
    $stmt = $pdo->prepare("DELETE FROM Equipments WHERE id = ?");


    $stmt->execute([$_GET['id']]);

}
header('Location: readEquipment.php');