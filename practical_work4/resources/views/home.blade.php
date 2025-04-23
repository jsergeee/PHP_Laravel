@extends('layouts.default')

@section('content')
@if ($errors->any())
<div style="color:red;">
<h2>Ошибки:</h2>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

@if (session('age') !== null)
@if (session('age') < 18)
<p>Указанный человек слишком молод.</p>
@else
<h2>Добро пожаловать, {{ session('first_name') }}!</h2>
<p>Вернуться к заполнению <a href="{{ route('contacts') }}">формы</a>.</p>
<p>Ваш возраст: {{ session('age') }}</p>
@endif
@else
<h2>Добро пожаловать, Гость!</h2>
<p>Заполните <a href="{{ route('contacts') }}">форму</a> для получения дополнительной информации.</p>
@endif

@if (session('email') === '')
<div style="color:red;">Адрес электронной почты не указан.</div>
@elseif(session('email'))
<p>Email: {{ session('email') }}</p>
@endif
@endsection