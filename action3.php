<?php include "connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "connection.php";
$where = 0;
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client 
    WHERE $db.client.balance < :balance");
$sqlSelect->execute(array('balance' => $where));
echo "Пользователи с отрицательным балансом: <ol>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<li>Имя: $cell[1], IP: $cell[4], balance: $cell[5]</li>";
}
echo "</ol>"
?>
</body>
</html>