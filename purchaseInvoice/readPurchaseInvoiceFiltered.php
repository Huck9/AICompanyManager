<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);



if ($_POST['type'] == 'month') {
    if ($_POST['month'] != '') {
        list($year,$month) = explode("-",$_POST['month']);
        $stmt = $pdo->prepare("SELECT * FROM purchaseInvoice WHERE YEAR(date)=? AND MONTH(date) = ? ");
        $stmt->execute([$year,$month]);

    } else {
        $stmt = $pdo->prepare("SELECT * FROM purchaseInvoice ");
        echo "<p>Podaj miesiąc </p>";
    }

} else {
    $year = $_POST['year'];
    $stmt = $pdo->prepare("SELECT * FROM purchaseInvoice WHERE YEAR(date)=?");
    $stmt->execute([$year]);
}
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Invoice");
?>

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

  <button><a href="readPurchaseInvoice.php">Powrót do faktur</a></button>
<?php
template_footer();
