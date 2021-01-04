<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM salesInvoice");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>
    <button><a href="addSalesInvoiceForm.php">Dodaj fakturę</a></button>
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

                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?=$invoice['id']?></td>
                <td><?=$invoice['invoiceNumber']?></td>
                <td><?=$invoice['contractorName']?></td>
                <td><?=$invoice['vatID']?></td>
                <td><?=$invoice['nettoValue']?></td>
                <td><?=$invoice['vatValue']?></td>
                <td><?=$invoice['bruttoValue']?></td>
                <td><?=$invoice['nettoValueOther']?></td>
                <td><?=$invoice['nettoOtherName']?></td>
                <td class="actions">
                    <a href="updateSalesInvoiceForm.php?id=<?=$invoice['id']?>" class="edit"><i class='fas fa-edit' style='font-size:24px'></i></a>
                    <a href="deleteSalesInvoice.php?id=<?=$invoice['id']?>" class="delete"><i class='fas fa-trash-alt' style='font-size:24px'></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();