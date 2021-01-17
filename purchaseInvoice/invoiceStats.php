<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);

template_header("Read Invoice");
?>

<form action="#">
   Rok: <input name="year" type="number" min="1900" max="2099" step="1" value="2021" /><br>
    Miesiac: <input  type="month" /><br>
    <input type="submit" value="wyświetl raport">
</form>
<?php

template_footer();
