<?php
require_once("../config.php");
global $config;
if (isset($_GET['NrInwentarzowy'])) {

    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
    $stmt = $pdo->prepare("DELETE FROM licences WHERE NrInwentarzowy = ?");

    $stmt->execute([$_GET['NrInwentarzowy']]);

}
header('Location: readLicence.php');
