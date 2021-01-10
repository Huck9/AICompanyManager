<?php
require_once("../config.php");
require_once("../uploadFiles/upload.php");
global $config;

if (!empty($_POST)) {
    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);

    $stmt = $pdo->prepare("Insert into Documents (IdDocument,documentDate, notes, filename) values (?, ?, ?,?)");
    $IdDocument = isset($_POST['IdDocument']) ? $_POST['IdDocument'] : '';
    $documentDate = isset($_POST['documentDate']) ? $_POST['documentDate'] : '';
    $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
    uploadFile($_FILES['file']);
    $stmt->execute([$IdDocument,$documentDate,$notes, $_FILES['file']['name']]);
}

header('Location: readDocument.php');