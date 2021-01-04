<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM licences");
$licences = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
    <button><a href="addLicencesForm.php">Dodaj licencje</a></button>
    <table>
        <thead>
        <tr>
            <td>Numer inwentarzowy</td>
            <td>Nazwa</td>
            <td>Klucz seryjny</td>
            <td>Data zakupu</td>
            <td>Id faktury</td>
            <td>Ważność wsparcia</td>
            <td>Ważność licencji</td>
            <td>Czy jest bezterminowo</td>
            <td>Obecny posiadacz</td>
            <td>Notatki</td>

            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($licences as $licence): ?>
            <tr>
                <td><?=$licence['NrInwentarzowy']?></td>
                <td><?=$licence['Nazwa']?></td>
                <td><?=$licence['KluczSeryjny']?></td>
                <td><?=$licence['DataZakupu']?></td>
                <td><?=$licence['IdFaktury']?></td>
                <td><?=$licence['WaznoscWsparcia']?></td>
                <td><?=$licence['WaznoscLicencji']?></td>
                <td><?=$licence['Bezterminowo']?></td>
                <td><?=$licence['Uzytkownik']?></td>
                <td><?=$licence['Notatki']?></td>
                <td class="actions">
                    <a href="updateLicencesForm.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>" >Edytuj</a>
                    <a href="deleteLicence.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>" >Usuń</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php