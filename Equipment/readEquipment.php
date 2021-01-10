<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM Equipments");
$equipments = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Equipment");
?>
    <button><a href="addEquipmentForm.php" class="add">Dodaj sprzęt</a></button>
    <p></p>
    <table>
        <thead>
        <tr class="category">
            <td>Numer inwentarzowy</td>
            <td>Nazwa</td>
            <td>Numer seryjny</td>
            <td>Data zakupu</td>
            <td>Id faktury
            </th>
            <td>Gwarancja</td>
            <td>Wartość netto</td>
            <td>User</td>
            <td>Notatki</td>
            <td>Id</td>
            <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                <td>Opcja</td>
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