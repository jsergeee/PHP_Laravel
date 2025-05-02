<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DataLogger;

Route::get('/logs', function () {
    return view('logs');
});

Route::get('/test', function () {
    \Log::info('Вызов маршрута /test');
    return 'Test route';
})->middleware(\App\Http\Middleware\DataLogger::class);