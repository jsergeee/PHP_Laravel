@extends('layouts.default')

@section('content')
<h2>Контактная информация</h2>

<form action="{{ route('submitContact') }}" method="POST">
@csrf
<div>
<label for="first_name">Имя:</label>
<input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
@error('first_name')
<div style="color:red;">{{ $message }}</div>
@enderror
</div>

<div>
<label for="last_name">Фамилия:</label>
<input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
@error('last_name')
<div style="color:red;">{{ $message }}</div>
@enderror
</div>

<div>
<label for="email">Email:</label>
<input type="email" name="email" id="email" value="{{ old('email') }}">
@error('email')
<div style="color:red;">{{ $message }}</div>
@enderror
</div>

<div>
<label for="age">Возраст:</label>
<input type="number" name="age" id="age" value="{{ old('age') }}" required>
@error('age')
<div style="color:red;">{{ $message }}</div>
@enderror
</div>

<button type="submit">Отправить</button>
</form>
@endsection