<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM purchaseinvoice");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>
    <button><a href="addPurchaseInvoiceForm.php" class="add">Dodaj fakturę</a></button>
    <p></p>
    <table>
        <thead>
        <tr class="category">
            <td>ID</td>
            <td>Numer faktury</td>
            <td>Numer kontrahenta</td>
            <td>VAT ID:</td>
            <td>Wartość netto</td>
            <td>Wartość VAT</td>
            <td>Wartość brutto</td>
            <td>Wartość netto w innej walucie</td>
            <td>Skrót waluty</td>
            <td>Nazwa pliku</td>
            <td>Opcja</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr class="type">
                <td><?= $invoice['id'] ?></td>
                <td><?= $invoice['invoiceNumber'] ?></td>
                <td><?= $invoice['contractorName'] ?></td>
                <td><?= $invoice['vatID'] ?></td>
                <td><?= $invoice['nettoValue'] ?></td>
                <td><?= $invoice['vatValue'] ?></td>
                <td><?= $invoice['bruttoValue'] ?></td>
                <td><?= $invoice['nettoValueOther'] ?></td>
                <td><?= $invoice['nettoOtherName'] ?></td>
                <td><a href="../uploadFiles/uploads/<?= $invoice['filename'] ?>" class="dont-break-out"><?= $invoice['filename'] ?></td>
                <td class="actions">
                    <a href="updatePurchaseInvoiceForm.php?id=<?= $invoice['id'] ?>" class="edit"><i class='fas fa-edit' style='font-size:24px'></i></a>
                    <a href="deletePurchaseInvoice.php?id=<?= $invoice['id'] ?>" class="delete"><i class='fas fa-trash-alt' style='font-size:24px'></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();