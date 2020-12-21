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
        #naglowek{
            text-align: center;
            font-size: 50px;
        }
        body {
            background-color: #fff3ea;
        }
    </style>
</head>
<body>
<div id="naglowek">List of licences</div>
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
    $dsn = "mysql:host=localhost;dbname=id15055529_company";
    $user = "root";
    $passwd = "";
    $pdo = new PDO($dsn, $user, $passwd);
    $stm = $pdo->query("SELECT * FROM licences");
    $rows = $stm->fetchALL(PDO::FETCH_ASSOC);

    foreach($rows as $row){
        echo "<tr><td>" . $row['NrInwentarzowy']. "</td><td>" . $row['Nazwa']. "</td><td>" . $row['KluczSeryjny']. "</td><td>" . $row['DataZakupu']. "</td><td>" . $row['IdFaktury']. "</td><td>"  . $row['WaznoscWsparcia']. "</td><td>" . $row['WaznoscLicencji']. "</td><td>" .$row['Bezterminowo']. "</td><td>" . $row['Uzytkownik']. "</td><td>" .$row['Notatki']. "</td></tr>";
    }
    ?>
</table>
</div>
</body>
</html>
