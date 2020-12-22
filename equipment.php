<!DOCTYPE html>
<html>
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
        #equipment {
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
<body>
<div id="naglowek">List of equipment</div>
<div id="equipment">
<table>
    <tr id="nazwykolumn">
        <th>Numer inwentarzowy</th>
        <th>Nazwa</th>
        <th>Numer seryjny</th>
        <th>Data zakupu</th>
        <th>Id faktury</th>
        <th>Gwarancja do</th>
        <th>Wartość netto</th>
        <th>User</th>
        <th>Notatki</th>
        <th>Id</th>
    </tr>
    <?php
    $dsn = "mysql:host=localhost;dbname=id15055529_company";
    $user = "root";
    $passwd = "";
    $pdo = new PDO($dsn, $user, $passwd);
    $stm = $pdo->query("SELECT * FROM Equipments");
    $rows = $stm->fetchALL(PDO::FETCH_ASSOC);

    foreach($rows as $row){
        echo "<tr><td>" . $row['inventoryNumber']. "</td><td>" . $row['name']. "</td><td>" . $row['serialNumber']. "</td><td>" . $row['purchaseDate']. "</td><td>" . $row['invoiceNumber']. "</td><td>"  . $row['warrantyExpiryDate']. "</td><td>" . $row['netValue']. "</td><td>" .$row['userId']. "</td><td>" . $row['notes']. "</td><td>" .$row['id']. "</td></tr>";
    }
    ?>
</table>
</div>
</body>
</html>