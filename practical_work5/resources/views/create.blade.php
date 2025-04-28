<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
</head>
<body>
    <form method="POST" action="/employees">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="surname">Фамилия:</label>
        <input type="text" id="surname" name="surname" required>
        <br>
        <label for="position">Должность:</label>
        <input type="text" id="position" name="position" required>
        <br>
        <label for="address">Адрес проживания:</label>
        <input type="text" id="address" name="address" required>
        <br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
