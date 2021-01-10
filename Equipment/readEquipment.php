<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM Equipments");
$equipments = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Equipment");
?>
    <button><a href="addEquipmentForm.php">Dodaj sprzęt</a></button>
	<table>
        <thead>
            <tr>
                <td>Numer inwentarzowy</td>
                <td>Nazwa</td>
                <td>Numer seryjny</td>
                <td>Data zakupu</td>
                <td>Id faktury</th>
                <td>Gwarancja</td>
                <td>Wartość netto</td>
                <td>User</td>
                <td>Notatki</td>
                <td>Id</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipments as $equipment): ?>
            <tr>
                <td><?=$equipment['inventoryNumber']?></td>
                <td><?=$equipment['name']?></td>
                <td><?=$equipment['serialNumber']?></td>
                <td><?=$equipment['purchaseDate']?></td>
                <td><?=$equipment['invoiceNumber']?></td>
                <td><?=$equipment['warrantyExpiryDate']?></td>
                <td><?=$equipment['netValue']?></td>
                <td><?=$equipment['userId']?></td>
                <td><?=$equipment['notes']?></td>
                <td><?=$equipment['id']?></td>
                <td class="actions">
                    <a href="updateEquipmentForm.php?id=<?=$equipment['id']?>" >Edytuj</a>
                    <a href="deleteEquipment.php?id=<?=$equipment['id']?>" >Usuń</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();