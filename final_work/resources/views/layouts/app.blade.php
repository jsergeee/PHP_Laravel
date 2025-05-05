<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
    <!-- Подключите стили, скрипты и мета-теги по необходимости -->
</head>
<body>
    <header>
        <h1>Моя панель</h1>
        <!-- Навигация или логотип -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Мой сайт</p>
    </footer>
</body>
</html>