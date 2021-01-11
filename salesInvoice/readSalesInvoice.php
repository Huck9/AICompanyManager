<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);


$brutto = 0;
$netto = 0;
$stmt = $pdo->query("SELECT * FROM salesInvoice ");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cnt = 0;
foreach ($invoices as $invoice):
    $cnt++;
    $netto += $invoice['nettoValue'];
    $brutto += $invoice['bruttoValue'];
endforeach;

if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
} else {
    $limit = 25;
}

$currentPage = 0;
$page = ceil($cnt / $limit);
if (isset($_GET["page"])) {
    $currentPage = $_GET["page"];
}

$offset = $limit * $currentPage;
$stmt = $pdo->query("SELECT * FROM salesInvoice LIMIT $offset, $limit ");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);


template_header("Read Invoice");
?>
    <button><a href="addSalesInvoiceForm.php" class="add">Dodaj fakturę</a></button>
    <script src="../search.js"></script>
    <p></p>
    <input type="text" id="search" onkeyup="searchFunction()" placeholder="Podaj fraze do wyszukania">
    <select id="search_select">
        <option value="0">ID</option>
        <option value="1">Numer faktury</option>
        <option value="2">Numer kontrahenta</option>
        <option value="3">VAT ID</option>
        <option value="4">Wartość netto</option>
        <option value="5">Wartość VAT</option>
        <option value="6">Wartość brutto</option>
        <option value="7">Wartość netto w innej walucie</option>
        <option value="8">Skrót waluty</option>
        <option value="9">Nazwa pliku</option>
    </select>
    <p></p>
    <table id="table">
        <thead>
        <tr class="category">
            <th>ID</th>
            <th>Numer faktury</th>
            <th>Numer kontrahenta</th>
            <th>VAT ID</th>
            <th>Wartość netto</th>
            <th>Wartość VAT</th>
            <th>Wartość brutto</th>
            <th>Wartość netto w innej walucie</th>
            <th>Skrót waluty</th>
            <th>Nazwa pliku</th>
            <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik") : ?>
                <th>Opcja</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr class="type">
                <td><?= $invoice['id'] ?></td>
                <td><?= $invoice['invoiceNumber'] ?></td>
                <td><?= $invoice['contractorName'] ?></td>
                <td><?= $invoice['vatID'] ?></td>
                <td><?= $invoice['nettoValue'] ?><?php //$netto+=$invoice['nettoValue']; ?></td>
                <td><?= $invoice['vatValue'] ?></td>
                <td><?= $invoice['bruttoValue'] ?><?php // $brutto+=$invoice['bruttoValue']; ?></td>
                <td><?= $invoice['nettoValueOther'] ?></td>
                <td><?= $invoice['nettoOtherName'] ?></td>
                <td><a href="../uploadFiles/uploads/<?= $invoice['filename'] ?>"
                       class="dont-break-out"><?= $invoice['filename'] ?></td>
                <td class="actions">
                    <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik") : ?>
                        <a href="updateSalesInvoiceForm.php?id=<?= $invoice['id'] ?>" class="edit"><i
                                    class='fas fa-edit' style='font-size:24px'></i></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                        <a href=updateSalesInvoiceForm.php?id=<?= $invoice['id'] ?>" class="delete"><i
                                    class='fas fa-trash-alt' style='font-size:24px'></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    Strona:
<?php

for ($i = 1; $i <= $page; $i++) {

    ?>

    <a href="readSalesInvoice.php?page=<?= $i - 1 ?>"><?= $i ?></a>
    <?php

}
?>
    <p>Wartość netto: <?= $netto ?></p>
    <p>Wartość brutto: <?= $brutto ?></p>
<?php

template_footer();