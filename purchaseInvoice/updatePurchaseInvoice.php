<?php
require_once("../config.php");
require_once("../uploadFiles/upload.php");
global $config;
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        $stmt = $pdo->prepare("Update purchaseinvoice set invoiceNumber = ?, contractorName = ?, vatID = ?, nettoValue =?, vatValue =?, bruttoValue=?, nettoValueOther = ?, nettoOtherName =?, filename=?, date=? where id = ?");
        $invoiceNumber = isset($_POST['invoiceNumber']) ? $_POST['invoiceNumber'] : '';
        $contractorName = isset($_POST['contractorName']) ? $_POST['contractorName'] : '';
        $vatID = isset($_POST['vatID']) ? $_POST['vatID'] : '';
        $nettoValue = isset($_POST['nettoValue']) ? $_POST['nettoValue'] : '';
        $vatValue = isset($_POST['vatValue']) ? $_POST['vatValue'] : '';
        $bruttoValue = isset($_POST['bruttoValue']) ? $_POST['bruttoValue'] : '';
        $nettoValueOther = isset($_POST['nettoValueOther']) ? $_POST['nettoValueOther'] : '';
        $nettoOtherName = isset($_POST['nettoOtherName']) ? $_POST['nettoOtherName'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        uploadFile($_FILES['file']);
        $stmt->execute([$invoiceNumber,$contractorName,$vatID,$nettoValue,$vatValue,$bruttoValue,$nettoValueOther,$nettoOtherName, $_FILES['file']['name'],$date,$_GET['id']]);
       }
}
header('Location: readPurchaseInvoice.php');