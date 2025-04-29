<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список книг</title>
</head>
<body>
    <h1>Список книг</h1>

    @if(count($books))
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Жанр</th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Нет книг.</p>
    @endif
</body>
</html>
