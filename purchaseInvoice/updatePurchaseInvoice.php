<?php
require_once("../config.php");
global $config;
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        $stmt = $pdo->prepare("Update purchaseinvoice set invoiceNumber = ?, contractorName = ?, vatID = ?, nettoValue =?, vatValue =?, bruttoValue=?, nettoValueOther = ?, nettoOtherName =? where id = ?");
        $invoiceNumber = isset($_POST['invoiceNumber']) ? $_POST['invoiceNumber'] : '';
        $contractorName = isset($_POST['contractorName']) ? $_POST['contractorName'] : '';
        $vatID = isset($_POST['vatID']) ? $_POST['vatID'] : '';
        $nettoValue = isset($_POST['nettoValue']) ? $_POST['nettoValue'] : '';
        $vatValue = isset($_POST['vatValue']) ? $_POST['vatValue'] : '';
        $bruttoValue = isset($_POST['bruttoValue']) ? $_POST['bruttoValue'] : '';
        $nettoValueOther = isset($_POST['nettoValueOther']) ? $_POST['nettoValueOther'] : '';
        $nettoOtherName = isset($_POST['nettoOtherName']) ? $_POST['nettoOtherName'] : '';

        $stmt->execute([$invoiceNumber,$contractorName,$vatID,$nettoValue,$vatValue,$bruttoValue,$nettoValueOther,$nettoOtherName,$_GET['id']]);
       }
}
header('Location: readPurchaseInvoice.php');