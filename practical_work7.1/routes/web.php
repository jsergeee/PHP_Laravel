<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfGeneratorController;

Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/pdf/{id}', [PdfGeneratorController::class, 'index']);