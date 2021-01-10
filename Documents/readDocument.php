<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM Documents");
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Document");
?>
    <button><a href="addPurchaseInvoiceForm.php">Dodaj fakturę</a></button>
	<table>
        <thead>
        <tr>
            <td>Id Dokumentu</td>
            <td>Data Dokumentu</td>
            <td>Notatki</td>
            <td>Nazwa Pliku</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
            <tr>
                <td><?=$document['IdDocument']?></td>
                <td><?=$document['documentDate']?></td>
                <td><?=$document['notes']?></td>
                <td><a href="../uploadFiles/uploads/<?=$document['filename']?>"><?=$document['filename']?></td>
                <td class="actions">
                    <a href="updateDocumentsForm.php?id=<?=$document['id']?>" >Edytuj</a>
                    <a href="deleteDocuments.php?id=<?=$document['id']?>" >Usuń</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();