<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM salesInvoice");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>
    <button><a href="addSalesInvoiceForm.php" class="add">Dodaj fakturę</a></button>
    <p></p>
    <table>
        <thead>
        <tr class="category">
            <td>ID</td>
            <td>invoiceNumber</td>
            <td>contractorName</td>
            <td>vatID</td>
            <td>nettoValue</td>
            <td>vatValue</td>
            <td>bruttoValue</td>
            <td>nettoValueOther</td>
            <td>nettoOtherName</td>
            <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                <td>Opcja</td>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= $invoice['id'] ?></td>
                <td><?= $invoice['invoiceNumber'] ?></td>
                <td><?= $invoice['contractorName'] ?></td>
                <td><?= $invoice['vatID'] ?></td>
                <td><?= $invoice['nettoValue'] ?></td>
                <td><?= $invoice['vatValue'] ?></td>
                <td><?= $invoice['bruttoValue'] ?></td>
                <td><?= $invoice['nettoValueOther'] ?></td>
                <td><?= $invoice['nettoOtherName'] ?></td>
                <td class="actions">
                    <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik") : ?>
                        <a href="updateSalesInvoiceForm.php?id=<?= $invoice['id'] ?>" class="edit"><i
                                    class='fas fa-edit'
                                    style='font-size:24px'></i></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                        <a href="deleteSalesInvoice.php?id=<?= $invoice['id'] ?>" class="delete"><i
                                    class='fas fa-trash-alt' style='font-size:24px'></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();