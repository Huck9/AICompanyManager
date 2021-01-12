<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM licences");
$licences = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>
    <button><a href="addLicencesForm.php" class="add">Dodaj licencję</a></button>
    <script src="../search.js"></script>
    <p></p>
    <input type="text" id="search" onkeyup="searchFunction()" placeholder="Podaj fraze do wyszukania">
    <select id="search_select">
        <option value="0">Numer inwentarzowy</option>
        <option value="1">Nazwa</option>
        <option value="2">Klucz seryjny</option>
        <option value="3">Data zakupu</option>
        <option value="4">Id faktury</option>
        <option value="5">Ważność wsparcia</option>
        <option value="6">Ważność licencji</option>
        <option value="7">Czy jest bezterminowo</option>
        <option value="8">Obecny posiadacz</option>
        <option value="9">Notatki</option>
    </select>
    <p></p>
    <table id="table">
        <thead>
        <tr class="category" class="header">
            <th>Numer inwentarzowy</th>
            <th>Nazwa</th>
            <th>Klucz seryjny</th>
            <th>Data zakupu</th>
            <th>Id faktury</th>
            <th>Ważność wsparcia</th>
            <th>Ważność licencji</th>
            <th>Czy jest bezterminowo</th>
            <th>Obecny posiadacz</th>
            <th>Notatki</th>
            <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                <th>Opcja</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($licences as $licence): ?>
            <tr class="type">
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
                    <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                    <a href="updateLicencesForm.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>"
                       class="edit"><i class='fas fa-edit' style='font-size:24px'></i></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                    <a href="deleteLicence.php?NrInwentarzowy=<?php echo $licence['NrInwentarzowy']; ?>" class="delete"><i
                                class='fas fa-trash-alt' style='font-size:24px'></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php