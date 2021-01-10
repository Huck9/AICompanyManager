<?php
require_once("config.php");
global $config;

session_start();
if (isset($_SESSION) && isset($_SESSION['name'])) {
    echo "Current user: {$_SESSION['name']}, session id: " . session_id();
} else {
    echo "No session started.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="panel_css.css">
</head>
<body>

<div class="sidebar-container">
    <div class="sidebar-logo">
M&M – Company Manager
</div>
    <ul class="sidebar-navigation">
        <li class="header">Faktury</li>
        <li>
            <a href="purchaseInvoice/readPurchaseInvoice.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Faktury zakupu
</a>
        </li>
        <li>
            <a href="salesInvoice/readSalesInvoice.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Faktury sprzedaży
</a>
        </li>
        <li class="header">Inne</li>
        <li>
            <a href="Documents/readDocument.php">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Dokumenty
            </a>
        </li>
        <li>
            <a href="Equipment/readEquipment.php">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Sprzęt
            </a>
        </li>
        <li>
            <a href="Licences/readLicence.php">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Licencje
            </a>
        </li>
        <li class="header">Konto</li>
        <li>
            <a href="index.php">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Wyloguj
            </a>
        </li>
    </ul>
</div>

<div class="content-container">
    <p>Witaj na stronie do zarządzania fakturami !!!</p>
</div>

</body>
</html>