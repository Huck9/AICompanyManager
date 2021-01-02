<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>

    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            text-align: left;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        tr:hover {background-color: #f5f5f5;}
        #tablelicence {
            padding-left: 10%;
        }
        #nazwykolumn {
            background-color: greenyellow;
        }
        #naglowek {
            text-align: center;
            font-size: 50px;
        }
        body {
            background-color: #fff3ea;
        }
        #panellicence {
            text-align: center;
            padding-bottom: 5px;
        }
        button{
            display:inline-block;
            padding:0.3em 1.2em;
            margin:0 0.3em 0.3em 0;
            border-radius:2em;
            box-sizing: border-box;
            text-decoration:none;
            font-family:'Roboto',sans-serif;
            font-weight:300;
            color:#FFFFFF;
            background-color:#4eb5f1;
            text-align:center;
            transition: all 0.2s;
        }
        button:hover{
            background-color:#4095c6;
        }
    </style>
</head>
<body>
<div id="naglowek">List of licences</div>
<div id="panellicence">
    <input type="text" id="searchinput">
    <button id="searchlicence">Szukaj</button>
    <button id="addlicence">Dodaj nowy</button>
    <button id="editlicence">Edytuj</button>
</div>
<div id="tablelicence">
<table>
    <tr id="nazwykolumn">
        <th>Numer inwentarzowy</th>
        <th>Nazwa</th>
        <th>Klucz seryjny</th>
        <th>Data zakupu</th>
        <th>Id faktury</th>
        <th>Ważność wsparcia</th>
        <th>Ważność licencji</th>
        <th>Czy jest bezterminowo</th>
        <th>Obecny posiadacz</th>
        <th>Notatki</th>
    </tr>
    <?php
    require_once("config.php");
    global $config;
    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
    $stm = $pdo->query("SELECT * FROM licences");
    $rows = $stm->fetchALL(PDO::FETCH_ASSOC);

    foreach($rows as $row){
        echo "<tr><td>" . $row['NrInwentarzowy'].
            "</td><td>" . $row['Nazwa'].
            "</td><td>" . $row['KluczSeryjny'].
            "</td><td>" . $row['DataZakupu'].
            "</td><td>" . $row['IdFaktury'].
            "</td><td>"  . $row['WaznoscWsparcia'].
            "</td><td>" . $row['WaznoscLicencji'].
            "</td><td>" .$row['Bezterminowo'].
            "</td><td>" . $row['Uzytkownik'].
            "</td><td>" .$row['Notatki'].
            "</td></tr>";
    }
    ?>
</table>
</div>
</body>
</html>
