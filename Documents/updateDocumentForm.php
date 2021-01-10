<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM Documents WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <form method="post" action="updateDocument.php?id=<?=$_GET['id']?>">
        Numer Dokumentu:<input type="text" name="IdDocument"><br>
        Data<input type="date" name="documentDate"><br>
        Notatki<input type="text" name="notes"><br>
        <input type="file" name="file" size="50"><br>
        <input type="submit">
    </form>
<?php

}else{
    echo "Wybierz dokument do edycji";
}
