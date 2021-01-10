<?php
require_once("../config.php");
global $config;
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        $stmt = $pdo->prepare("Update Documents set date = ?, notes = ?, where IdDocument = ?");
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $notes = isset($_POST['notes']) ? $_POST['notes'] : '';


        $stmt->execute([$date,$notes,$_GET['IdDocument']]);
       }
}
header('Location: readDocument.php');