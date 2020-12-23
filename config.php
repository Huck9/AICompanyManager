<?php
$config = [];
$config['dsn'] = 'mysql:dbname=id15055529_company; host=localhost';
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
 
EOT;
}


function template_footer() {
    echo <<<EOT
    </body>
</html>
EOT;
}