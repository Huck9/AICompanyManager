<?php

require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT sum(`nettoValue`) as nettoValue, sum(`vatValue`) as vatValue, sum(`bruttoValue`) as bruttoValue, DATE_FORMAT(date, '%m %Y') as date FROM `purchaseinvoice` WHERE date IS NOT NULL GROUP BY DATE_FORMAT(date, '%m %Y')");
$purchaseInvoice = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT sum(`nettoValue`) as nettoValue, sum(`vatValue`) as vatValue, sum(`bruttoValue`) as bruttoValue, DATE_FORMAT(date, '%m %Y') as date FROM `salesInvoice` WHERE date IS NOT NULL GROUP BY DATE_FORMAT(date, '%m %Y')");
$salesInvoice = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT sum(salesinvoice.nettoValue) - sum(purchaseInvoice.nettoValue) as nettoValue, sum(salesinvoice.vatValue) - sum(purchaseInvoice.vatValue) as vatValue, sum(salesinvoice.bruttoValue) - sum(purchaseInvoice.bruttoValue) as bruttoValue , DATE_FORMAT(purchaseInvoice.date, '%m %Y') as date FROM purchaseinvoice JOIN salesinvoice ON DATE_FORMAT(purchaseInvoice.date, '%m %Y') = DATE_FORMAT(salesinvoice.date, '%m %Y') WHERE purchaseinvoice.date IS NOT NULL AND salesinvoice.date IS NOT NULL GROUP BY DATE_FORMAT(purchaseinvoice.date, '%m %Y')");
$diff = $stmt->fetchAll(PDO::FETCH_ASSOC);
template_header("Read Invoice");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";
?>
<h1>Podsumowanie miesięczne</h1>
    <h2>Faktury zakupu</h2>
<?php

foreach ($purchaseInvoice as $purchase){
    ?>

<h3><?= $purchase['date'] ?></h3>

<?php
    echo "Netto: ", $purchase['nettoValue']," VAT: ", $purchase['vatValue'], " Brutto: ",$purchase['bruttoValue'] ;
    echo "<br>";
}
?>
    <h2>Faktury sprzedaży:</h2>
<?php

foreach ($salesInvoice as $sales){
    echo "<h3>", $sales['date'], "</h3>";
    echo "Netto: ", $sales['nettoValue']," VAT: ", $sales['vatValue'], " Brutto: ",$sales['bruttoValue'] ;
    echo "<br>";
}
?>
    <h2>Dochód:</h2>

<?php
foreach ($diff as $sales){
    echo "<h3>", $sales['date'], "</h3>";
    echo "Netto: ", $sales['nettoValue']," VAT: ", $sales['vatValue'], " Brutto: ",$sales['bruttoValue'] ;
    echo "<br>";
}
template_footer();
} else {
    echo "No session started.";
}
