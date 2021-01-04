<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['NrInwentarzowy'])) {
    $stmt = $pdo->prepare('SELECT * FROM licences WHERE NrInwentarzowy = ?');
    $stmt->execute([$_GET['NrInwentarzowy']]);
    $licence = $stmt->fetch(PDO::FETCH_ASSOC);
    template_header("Edit Invoice");
    ?>
    <div class="container">
    <div class="left"></div>
    <form method="post" action="updateLicence.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>">
        <div class="inputs">
        Nazwa: <input type="text" name="Nazwa" value="<?=$licence['Nazwa']?>" class="standardInput"><br>
        Klucz seryjny: <input type="number" name="KluczSeryjny" value="<?=$licence['KluczSeryjny']?>" class="standardInput"><br>
        Data zakupu: <input type="date" name="DataZakupu" value="<?=$licence['DataZakupu']?>" class="standardInput"><br>
        Id faktury: <input type="text" name="IdFaktury"  value="<?=$licence['IdFaktury']?>" class="standardInput"><br>
        Ważność wsparcia: <input type="date" name="WaznoscWsparcia"  value="<?=$licence['WaznoscWsparcia']?>" class="standardInput"><br>
        Ważność licencji: <input type="date" name="WaznoscLicencji"  value="<?=$licence['WaznoscLicencji']?>" class="standardInput"><br>
        Czy jest bezterminowo: <input type="text" name="Bezterminowo"  value="<?=$licence['Bezterminowo']?>" class="standardInput"><br>
        Obecny posiadacz: <input type="number" name="Uzytkownik"  value="<?=$licence['Uzytkownik']?>" class="standardInput"><br>
        Notatki: <input type="text" name="Notatki"  value="<?=$licence['Notatki']?>" class="standardInput"><br>
        <input type="submit" class="submitInput">
        </div>
    </form>
        <div class="right"></div>
    </div>
    <?php

}else{
    echo "Wybierz licencje do edycji";
}