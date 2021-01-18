<?php

require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);

$brutto = 0;
$netto = 0;
$stmt = $pdo->query("SELECT * FROM purchaseinvoice ");
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

$isSearch = false;

if (isset($_GET['search']) && isset($_GET['option'])) {
    $isSearch = true;
    $search = $_GET['search'];
    $option = $_GET['option'];

    if ($option == 'id') {
        $stmt = $pdo->prepare("SELECT * FROM purchaseinvoice WHERE id=? ");
    } elseif ($option == 'invoiceNumber') {
        $stmt = $pdo->prepare("SELECT * FROM purchaseinvoice WHERE invoiceNumber=? ");
    } elseif ($option == 'contractorName') {
        $stmt = $pdo->prepare("SELECT * FROM purchaseinvoice WHERE contractorName=? ");
    } elseif ($option == 'vatID') {
        $stmt = $pdo->prepare("SELECT * FROM purchaseinvoice WHERE vatID=? ");
    }

    $stmt->execute([$search]);
    $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo $offset;
    $stmt = $pdo->query("SELECT * FROM purchaseinvoice LIMIT $offset, $limit ");
    $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


template_header("Read Invoice");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";

?>
    <button><a href="addPurchaseInvoiceForm.php" class="but">Dodaj fakturę</a></button>
    <p></p>
    <form action="#">
        <input type="text" id="search" name="search" placeholder="Podaj fraze do wyszukania">
        <select name="option" id="search_select">
            <option value="id">ID</option>
            <option value="invoiceNumber">Numer faktury</option>
            <option value="contractorName">Nazwa kontrahenta</option>
            <option value="vatID">VAT ID</option>
        </select>
        <button>Szukaj</button>
    </form>
    <p></p>
    <table id="table">
        <thead>
        <tr class="category">

            <th>ID</th>
            <th>Numer faktury</th>
            <th>Wartość netto</th>
            <th>Wartość VAT</th>
            <th>Wartość brutto</th>
            <th>Podgląd faktury</th>
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
                <td><?= $invoice['nettoValue'] ?><?php //$netto+=$invoice['nettoValue']; ?></td>
                <td><?= $invoice['vatValue'] ?></td>
                <td><?= $invoice['bruttoValue'] ?><?php // $brutto+=$invoice['bruttoValue']; ?></td>


                <td><a href="invoiceDetail.php?id=<?= $invoice['id'] ?>" class="edit">podgląd</a></td>
                <td class="actions">
                    <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik") : ?>
                        <a href="updatePurchaseInvoiceForm.php?id=<?= $invoice['id'] ?>" class="edit"><i
                                    class='fas fa-edit' style='font-size:24px'></i></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                        <a href="deletePurchaseInvoice.php?id=<?= $invoice['id'] ?>" class="delete"><i
                                    class='fas fa-trash-alt' style='font-size:24px'></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php
if (!$isSearch) {
    echo "Strona:";
    for ($i = 1; $i <= $page; $i++) {

        ?>

        <a href="readPurchaseInvoice.php?page=<?= $i - 1 ?>"><?= $i ?></a>
        <?php

    }
    ?>
    <br>

    <form method="post" action="readPurchaseInvoiceFiltered.php">
        Po czym chcesz sortować?
        <input type="radio" name="type" value="month" checked><label for="month">Miesiące</label>
        <input type="radio" name="type" value="year"><label for="month">Lata</label><br>

        Filtruj po miesiącach:<input type="month" name="month"/><br>
        Filtruj po latach:<input type="number" min="1900" max="2099" step="1" value="2020"  name="year"/><br>

        <p></p>
        <input type="submit" value="Sortuj" class="submitInput">
    </form>

    <p></p>
    <button><a href="invoiceStats.php" class="but">Podsumowanie</a></button>
    <p>Statystyki ogółem:</p>
    <p>Wartość netto: <?= $netto ?></p>
    <p>Wartość brutto: <?= $brutto ?></p>
    <?php
} else {
    ?>
    <a href="readPurchaseInvoice.php">Powrót do katalogu</a>
    <?php
}
template_footer();
} else {
    echo "No session started.";
}