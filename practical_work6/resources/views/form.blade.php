<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление новой книги</title>
    <style>
        /* Простой CSS для оформления форм и ошибок */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }
        .alert {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            color: red;
            background-color: #ffdada;
        }
        .success-message {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            color: green;
            background-color: #cafeba;
        }
    </style>
</head>
<body>

<h1>Добавление новой книги</h1>

<!-- Блок для отображения успешных сообщений -->
@if(session('success'))
<div class="success-message">
    {{ session('success') }}
</div>
@endif

<!-- Блок для отображения ошибок валидации -->
@if ($errors->any())
<div class="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Формирование формы -->
<form action="/store" method="POST">
    <!-- Используем CSRF-токен для защиты от XSRF атак -->
    @csrf

    <!-- Поле названия книги -->
    <label for="title">Название книги:</label><br>
    <input type="text" name="title" placeholder="Введите название книги" required><br>

    <!-- Поле имени автора -->
    <label for="author">Имя автора:</label><br>
    <input type="text" name="author" placeholder="Введите имя автора" maxlength="100" required><br>

    <!-- Выбор жанра -->
    <label for="genre">Жанр:</label><br>
    <select name="genre" required>
        <option value="" disabled selected>Выберите жанр...</option>
        <option value="fiction">Художественная литература</option>
        <option value="non-fiction">Нехудожественная литература</option>
        <option value="sci-fi">Научная фантастика</option>
        <option value="mystery">Детектив</option>
    </select><br>

    <!-- Кнопка отправки формы -->
    <button type="submit">Добавить книгу</button>
</form>

</body>
</html>
