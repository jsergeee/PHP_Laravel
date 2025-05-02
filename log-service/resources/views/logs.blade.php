<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Logs</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>IP</th>
                    <th>URL</th>
                    <th>Method</th>
                    <th>Input</th>
                </tr>
            </thead>
            <tbody>
<?php
// Подключение к базе данных
$db_server = "127.0.0.1";
$db_user = "root";
$db_password = "Zrjdtyrj+1";
$db_name = "my_project_laravel_bd";

// Объявляем переменную заранее
$db = null;

try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}

if ($db !== null) {
    // Выполнение SQL-запроса
    $sql = "SELECT id, time, duration, ip, url, method, input FROM logs";
    $statement = $db->prepare($sql);
    $statement->execute();

    // Получение результатов
    $result_array = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Вывод результатов в HTML-таблице
    echo "<div class='table'>";
    echo "<table>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td align='center'>" . $result_row['id'] . "</td>";
        echo "<td align='center'>" . $result_row['time'] . "</td>";
        echo "<td align='center'>" . $result_row['duration'] . "</td>";
        echo "<td align='center'>" . $result_row['ip'] . "</td>";
        echo "<td align='center'>" . $result_row['url'] . "</td>";
        echo "<td align='center'>" . $result_row['method'] . "</td>";
        echo "<td align='center'>" . $result_row['input'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "Ошибка подключения к базе данных.";
}

// Закрытие соединения с базой данных
$db = null;
?>





            </tbody>
        </table>
    </div>
</body>

</html>