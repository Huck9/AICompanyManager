<?php
require_once("../config.php");
global $config;
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
if (isset($_GET['NrInwentarzowy'])) {
    $stmt = $pdo->prepare('SELECT * FROM licences WHERE NrInwentarzowy = ?');
    $stmt->execute([$_GET['NrInwentarzowy']]);
    $licence = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <form method="post" action="updateLicence.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>">
        Nazwa:<input type="text" name="Nazwa" value="<?=$licence['Nazwa']?>"><br>
        Klucz seryjny:<input type="number" name="KluczSeryjny" value="<?=$licence['KluczSeryjny']?>"><br>
        Data zakupu: <input type="date" name="DataZakupu" value="<?=$licence['DataZakupu']?>"><br>
        Id faktury: <input type="text" name="IdFaktury"  value="<?=$licence['IdFaktury']?>"><br>
        Ważność wsparcia<input type="date" name="WaznoscWsparcia"  value="<?=$licence['WaznoscWsparcia']?>"><br>
        Ważność licencji<input type="date" name="WaznoscLicencji"  value="<?=$licence['WaznoscLicencji']?>"><br>
        Czy jest bezterminowo<input type="text" name="Bezterminowo"  value="<?=$licence['Bezterminowo']?>"><br>
        Obecny posiadacz<input type="number" name="Uzytkownik"  value="<?=$licence['Uzytkownik']?>"><br>
        Notatki<input type="text" name="Notatki"  value="<?=$licence['Notatki']?>"><br>
        <input type="submit">
    </form>
    <?php

}else{
    echo "Wybierz licencje do edycji";
}