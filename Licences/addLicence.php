<?php
require_once("../config.php");
global $config;

if (!empty($_POST)) {
    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);

    $stmt = $pdo->prepare("Insert into licences (Nazwa, KluczSeryjny, DataZakupu, IdFaktury, WaznoscWsparcia, WaznoscLicencji, Bezterminowo, Uzytkownik, Notatki) values (?, ?, ?, ?, ?,?,?,?,?)");
    $Nazwa = isset($_POST['Nazwa']) ? $_POST['Nazwa'] : '';
    $KluczSeryjny = isset($_POST['KluczSeryjny']) ? $_POST['KluczSeryjny'] : '';
    $DataZakupu = isset($_POST['DataZakupu']) ? $_POST['DataZakupu'] : '';
    $IdFaktury = isset($_POST['IdFaktury']) ? $_POST['IdFaktury'] : '';
    $WaznoscWsparcia = isset($_POST['WaznoscWsparcia']) ? $_POST['WaznoscWsparcia'] : '';
    $WaznoscLicencji = isset($_POST['WaznoscLicencji']) ? $_POST['WaznoscLicencji'] : '';
    $Bezterminowo = isset($_POST['Bezterminowo']) ? $_POST['Bezterminowo'] : '';
    $Uzytkownik = isset($_POST['Uzytkownik']) ? $_POST['Uzytkownik'] : '';
    $Notatki = isset($_POST['Notatki']) ? $_POST['Notatki'] : '';

    $stmt->execute([$Nazwa,$KluczSeryjny,$DataZakupu,$IdFaktury,$WaznoscWsparcia,$WaznoscLicencji,$Bezterminowo,$Uzytkownik,$Notatki]);



}
header('Location: readLicence.php');
