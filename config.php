<?php

$config = [];
$config['dsn'] = 'mysql:dbname=id15055529_company; host=127.0.0.1';
$config['username'] = 'root';
$config['password'] = '';

function template_header($title) {
    session_start();
    if (isset($_SESSION) && isset($_SESSION['name'])) {
        echo "Current user: {$_SESSION['name']}, session id: " . session_id();
    } else {
        echo "No session started.";
    }
    echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="../panel_css.css" type="text/css">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
	<body>
	<div class="sidebar-container">
    <div class="sidebar-logo">
        M&M – Company Manager
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Faktury</li>
        <li>
            <a href="../purchaseInvoice/readPurchaseInvoice.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Faktury zakupu
            </a>
        </li>
        <li>
            <a href="../salesInvoice/readSalesInvoice.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Faktury sprzedaży
            </a>
        </li>
        <li class="header">Inne</li>
        <li>
            <a href="../Documents/readDocument.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Dokumenty
            </a>
        </li>
        <li>
            <a href="../Equipment/readEquipment.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Sprzęt
            </a>
        </li>
        <li>
            <a href="../Licences/readLicence.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Licencje
            </a>
        </li>
        <li class="header">Konto</li>
        <li>
            <a href="../logout.php" >
                <i class="fa fa-tachometer" aria-hidden="true" ></i> Wyloguj
            </a>
        </li>
    </ul>
</div>
<div class="content-container">
EOT;
}


function template_footer() {
    echo <<<EOT
</div>
    </body>
</html>
EOT;
}