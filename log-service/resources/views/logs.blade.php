<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        overflow-x: auto; /* Для горизонтальной прокрутки при необходимости */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed; /* Фиксированное распределение ширин колонок */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        overflow: hidden; /* Скрывать переполнение */
        white-space: nowrap; /* Не переносить текст */
    }

    th {
        background-color: #f2f2f2;
    }

    /* Указываем ширину для каждой колонки */
    th:nth-child(1), td:nth-child(1) { width: 50px; }   /* ID */
    th:nth-child(2), td:nth-child(2) { width: 150px; }  /* Time */
    th:nth-child(3), td:nth-child(3) { width: 80px; }   /* Duration */
    th:nth-child(4), td:nth-child(4) { width: 100px; }  /* IP */
    th:nth-child(5), td:nth-child(5) { width: 300px; }  /* URL */
    th:nth-child(6), td:nth-child(6) { width: 80px; }   /* Method */
    th:nth-child(7), td:nth-child(7) { width: 150px; }  /* Input */
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

try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    die();
}

if ($db !== null) {
    // Выполнение SQL-запроса
    $sql = "SELECT id, time, duration, ip, url, method, input FROM logs";
    $statement = $db->prepare($sql);
    $statement->execute();

    // Получение результатов
    $result_array = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Вывод результатов в таблицу
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td align='center'>" . htmlspecialchars($result_row['id']) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($result_row['time']) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($result_row['duration']) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($result_row['ip']) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($result_row['url']) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($result_row['method']) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($result_row['input']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Ошибка подключения к базе данных.</td></tr>";
}

// Закрытие соединения
$db = null;
?>
        </tbody>
    </table>
</div>
</body>
</html>