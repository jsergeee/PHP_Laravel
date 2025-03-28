<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormProcessor;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userform', function () {
    return view('userform'); // Убедитесь, что представление называется userform.blade.php
});

// Добавляем новый маршрут для FormProcessor
// Route::post('/userform', [FormProcessor::class, 'index']);
Route::post('/store_form', [FormProcessor::class, 'store']);
