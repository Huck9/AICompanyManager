<?php

require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM Equipments");
$equipments = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Equipment");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";
?>
    <button><a href="addEquipmentForm.php" class="but">Dodaj sprzęt</a></button>
    <script src="../search.js"></script>
        <p></p>
        <input type="text" id="search" onkeyup="searchFunction()" placeholder="Podaj fraze do wyszukania">
        <select id="search_select">
            <option value="0">Numer inwentarzowy</option>
            <option value="1">Nazwa</option>
            <option value="2">Numer seryjny</option>
            <option value="3">Data zakupu</option>
            <option value="4">Id faktury</option>
            <option value="5">Gwarancja</option>
            <option value="6">Wartość netto</option>
            <option value="7">User</option>
            <option value="8">Notatki</option>
            <option value="9">Id</option>
        </select>
        <p></p>
    <table id="table">
        <thead>
        <tr class="category">
            <th>Numer inwentarzowy</th>
            <th>Nazwa</th>
            <th>Numer seryjny</th>
            <th>Data zakupu</th>
            <th>Id faktury</th>
            <th>Gwarancja</th>
            <th>Wartość netto</th>
            <th>User</th>
            <th>Notatki</th>
            <th>Id</th>
            <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                <th>Opcja</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($equipments as $equipment): ?>
            <tr class="type">
                <td><?= $equipment['inventoryNumber'] ?></td>
                <td><?= $equipment['name'] ?></td>
                <td><?= $equipment['serialNumber'] ?></td>
                <td><?= $equipment['purchaseDate'] ?></td>
                <td><?= $equipment['invoiceNumber'] ?></td>
                <td><?= $equipment['warrantyExpiryDate'] ?></td>
                <td><?= $equipment['netValue'] ?></td>
                <td><?= $equipment['userId'] ?></td>
                <td><?= $equipment['notes'] ?></td>
                <td><?= $equipment['id'] ?></td>
                <td class="actions">
                    <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                        <a href="updateEquipmentForm.php?id=<?= $equipment['id'] ?>" class="edit"><i class='fas fa-edit'
                                                                                                     style='font-size:24px'></i></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                        <a href="deleteEquipment.php?id=<?= $equipment['id'] ?>" class="delete"><i
                                    class='fas fa-trash-alt' style='font-size:24px'></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();
} else {
    echo "No session started.";
}