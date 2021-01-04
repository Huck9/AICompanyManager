<?php
$config = [];
$config['dsn'] = 'mysql:dbname=id15055529_company; host=127.0.0.1';
$config['username'] = 'root';
$config['password'] = '';

function template_header($title) {
    echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
	<div class="sidebar-container">
    <div class="sidebar-logo">
        M&M – Company Manager
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Faktury</li>
        <li>
            <a href="#">
                <i class="fa fa-home" aria-hidden="true"></i> Dodawanie faktury
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Faktury zakupu
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Faktury sprzedaży
            </a>
        </li>
        <li class="header">Inne</li>
        <li>
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> Dodawanie dokumentu
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> Sprzęt
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Licencje
            </a>
        </li>
    </ul>
</div>
EOT;
}


function template_footer() {
    echo <<<EOT
    </body>
</html>
EOT;
}