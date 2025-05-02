<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfGeneratorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Получение всех пользователей из БД
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Получение одного пользователя через id, переданный в параметрах роута
Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');

// Запись нового пользователя в базу данных
Route::post('/store-user', [UserController::class, 'store'])->name('users.store');

// Получение данных о пользователе в виде PDF-файла
Route::get('/resume/{id}', [PdfGeneratorController::class, 'index'])->name('pdf.index');

Route::get('/create-user', function () {
    return view('users.create');
})->name('users.create');
