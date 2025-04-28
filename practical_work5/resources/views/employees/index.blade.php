<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список сотрудников</title>
</head>
<body>
    <h1>Список сотрудников</h1>

    @if($employees->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Должность</th>
                    <th>Адрес</th>
                    <th>Дополнительная информация</th>
                    <th>Навыки</th>
                    <th>Опыт</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->surname }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->address }}</td>
                        <!-- Преобразуем JSON в массив и выводим поля -->
                        <td>{{ $employee->json_data['info'] ?? '' }}</td>
                        <td>{{ implode(', ', $employee->json_data['skills'] ?? []) }}</td>
                        <td>{{ $employee->json_data['experience'] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Нет сотрудников.</p>
    @endif
</body>
</html>
