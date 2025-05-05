<!DOCTYPE html>
<html>
<head>
<title>Create User</title>
</head>
<body>
<form action="{{ url('/users') }}" method="post">
@csrf
<label for="name">Name:</label>
<input type="text" name="name" placeholder="Имя" required>
<br>
<label for="surname">Surname:</label>
<input type="text" name="surname" placeholder="Фамилия" required>
<br>
<label for="email">Email:</label>
<input type="email" name="email" placeholder="Email" required>
<br>
<button type="submit">Submit</button>
</form>
</body>
</html>