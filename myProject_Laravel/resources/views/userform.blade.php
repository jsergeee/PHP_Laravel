<!DOCTYPE html>
<html>

<head>
    <title>User Form</title>
</head>

<body>
    <h1>User Form</h1>
    <form action="/store_form" method="POST">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
