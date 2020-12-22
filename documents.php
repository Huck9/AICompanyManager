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
        #documents {
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
<div id="naglowek">List of Documents</div>
<div id="documents">
<table>
    <tr id="nazwykolumn">
        <th>Data Dokumentu</th>
        <th>Notatki</th>
    </tr>
    <?php
    $dsn = "mysql:host=localhost;dbname=id15055529_company";
    $user = "root";
    $passwd = "";
    $pdo = new PDO($dsn, $user, $passwd);
    $stm = $pdo->query("SELECT * FROM Documents");
    $rows = $stm->fetchALL(PDO::FETCH_ASSOC);

    foreach($rows as $row){
        echo "<tr><td>" . $row['documentDate']. "</td><td>" . $row['notes']. "</td></tr>";
    }
    ?>
</table>
</div>
</body>
</html>