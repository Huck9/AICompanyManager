<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM Documents WHERE IdDocument = ?');
    $stmt->execute([$_GET['id']]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
    template_header("Edit Invoice");
    ?>
    <div class="container">
        <div class="left"></div>
        <form method="post" action="updateDocument.php?id=<?= $_GET['id'] ?>">
            <div class="inputs">
                Numer Dokumentu: <input type="text" name="IdDocument" value="<?=$document['IdDocument']?>" class="standardInput"><br>
                Data: <input type="date" name="documentDate" value="<?=$document['documentDate']?>" class="standardInput"><br>
                Notatki: <input type="text" name="notes" value="<?=$document['notes']?>" class="standardInput"><br>
                <input type="file" name="file" size="50"><br>
                <input type="submit" class="submitInput">
            </div>
        </form>
        <div class="right"></div>
    </div>
    <?php

} else {
    echo "Wybierz dokument do edycji";
}
