<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM licences");
$licences = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
    <button><a href="addLicencesForm.php">Dodaj licencje</a></button>
    <script src="search.js"></script>
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
    <table id="table">
        <thead>
        <tr class="header">
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