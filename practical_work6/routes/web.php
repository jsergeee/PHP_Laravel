<?php

// Роут для отображения формы
Route::get('/index', [App\Http\Controllers\BookController::class, 'index'])->name('book.index');

// Роут для обработки данных формы
Route::post('/store', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');

// Новый маршрут для вывода списка книг
Route::get('/list', [\App\Http\Controllers\BookController::class, 'showList'])->name('book.list');