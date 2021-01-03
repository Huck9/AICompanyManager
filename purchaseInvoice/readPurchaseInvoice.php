<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM purchaseinvoice");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>
    <button><a href="addPurchaseInvoiceForm.php">Dodaj fakturę</a></button>
	<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>invoiceNumber</td>
                <td>contractorName</td>
                <td>vatID</td>
                <td>nettoValue</td>
                <td>vatValue</td>
                <td>bruttoValue</td>
                <td>nettoValueOther</td>
                <td>nettoOtherName</td>
                <td>filename</td>
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
                <td><a href="../uploadFiles/uploads/<?=$invoice['filename']?>"><?=$invoice['filename']?></td>
                <td class="actions">
                    <a href="updatePurchaseInvoiceForm.php?id=<?=$invoice['id']?>" >Edytuj</a>
                    <a href="deletePurchaseInvoice.php?id=<?=$invoice['id']?>" >Usuń</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();