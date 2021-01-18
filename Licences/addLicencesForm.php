<?php

require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT id FROM purchaseinvoice");
$idpurchaseinvoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Add Invoice");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";
?>
    <div class="container">
        <div class="left"></div>
    <form method="post" action="addLicence.php">
        <div class="inputs">
        Nazwa: <input type="text" name="Nazwa" class="standardInput"><br>
        Klucz seryjny: <input type="number" name="KluczSeryjny" class="standardInput"><br>
        Data zakupu: <input type="date" name="DataZakupu" class="standardInput"><br>
        Id faktury:
        <select name="IdFaktury" class="standardInput">
        <?php foreach ($idpurchaseinvoices as $idpurchaseinvoice): ?>
            <option value=<?= $idpurchaseinvoice['id'] ?>><?= $idpurchaseinvoice['id'] ?></option>
        <?php endforeach; ?>
        </select>
        <br>
        Ważność wsparcia: <input type="date" name="WaznoscWsparcia" class="standardInput"><br>
        Ważność licencji: <input type="date" name="WaznoscLicencji" class="standardInput"><br>
        Czy jest bezterminowo: <input type="text" name="Bezterminowo" class="standardInput"><br>
        Obecny posiadacz: <input type="number" name="Uzytkownik" class="standardInput"><br>
        Notatki: <input type="text" name="Notatki" class="standardInput"><br>
        <input type="submit" class="submitInput">
        </div>
    </form>
        <div class="right"></div>
    </div>

<?php
} else {
    echo "No session started.";
}