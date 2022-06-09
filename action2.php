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
$start = $_GET["start"];
$stop = $_GET["stop"];
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.client
    join $db.seanse 
    on $db.client.id_client = $db.seanse.fid_client
    WHERE $db.seanse.start >= :start and $db.seanse.stop <= :stop" );
$sqlSelect->execute(array('start' => $start, 'stop' => $stop));
echo "Сатистика за указанный временной интервал: <ol>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<li>Имя: $cell[1], IP: $cell[4], balance: $cell[5], начало: $cell[7], конец: $cell[8], входящий трафик: $cell[9], выходящий трафик: $cell[10]</li>";
}
echo "</ol>"
?>
</body>
</html>