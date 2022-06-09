<?php include "connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаба1</title>
</head>
<body>
<form action="action1.php" method="get">
    <p><strong> Статистика работы в сети: </strong>
            <select name="statistic" id="statistic">
                <?php
                $sql = "SELECT DISTINCT name FROM $db.client";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    echo "<option> $cell[0] </option>";
                }
                ?>
            </select>
        <button>ОК</button>
    </p>
</form>
<form action="action2.php" method="get">
<p><strong>Статистика работы в сети за указанный промежуток времени:</strong>
        <select name="start" id="start">
            <?php
            $sql = "SELECT DISTINCT start FROM $db.seanse";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
        <select name="stop" id="stop">
        <?php
            $sql = "SELECT DISTINCT stop FROM $db.seanse";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
    <button>ОК</button>
</p>
</form>
<form action="action3.php" method="get">
<p><strong> Вывести людей с отрицательным балансом </strong>
    <button>ОК</button>
</p>
</form>
</body>
</html>