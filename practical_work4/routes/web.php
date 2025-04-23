<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contacts', function () {
    return view('contacts'); // Отображение формы для контактов
})->name('contacts');

Route::post('/submitContact', function (Request $request) {
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'age' => 'required|integer|min:0',
    ]);

    // Перенаправление с сохранением данных
    return redirect()->route('home')->with([
        'first_name' => $validatedData['first_name'],
        'age' => $validatedData['age'],
        'email' => $validatedData['email'],
    ]);
})->name('submitContact');