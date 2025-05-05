<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; // добавьте, если есть

// Главная страница сайта
Route::get('/', [HomeController::class, 'index'])->name('home');

// Страница входа для обычных пользователей
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Страница входа для админки
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);

// Группа маршрутов для админки (защищена middleware)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Дашборд админки по адресу /admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // остальные маршруты для админки
});

// Подключение маршрутов Voyager
Voyager::routes();