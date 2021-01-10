<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM licences");
$licences = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>
    <button><a href="addLicencesForm.php" class="add">Dodaj licencję</a></button>
    <p></p>
    <table>
        <thead>
        <tr class="category">
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
                <td><?= $licence['NrInwentarzowy'] ?></td>
                <td><?= $licence['Nazwa'] ?></td>
                <td><?= $licence['KluczSeryjny'] ?></td>
                <td><?= $licence['DataZakupu'] ?></td>
                <td><?= $licence['IdFaktury'] ?></td>
                <td><?= $licence['WaznoscWsparcia'] ?></td>
                <td><?= $licence['WaznoscLicencji'] ?></td>
                <td><?= $licence['Bezterminowo'] ?></td>
                <td><?= $licence['Uzytkownik'] ?></td>
                <td><?= $licence['Notatki'] ?></td>
                <td class="actions">
                    <a href="updateLicencesForm.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>"
                       class="edit"><i class='fas fa-edit' style='font-size:24px'></i></a>
                    <a href="deleteLicence.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>" class="delete"><i
                                class='fas fa-trash-alt' style='font-size:24px'></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php