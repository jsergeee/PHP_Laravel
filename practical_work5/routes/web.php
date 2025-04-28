<?php

use App\Http\Controllers\EmployeeController;

Route::get('/employees/create', [EmployeeController::class, 'index'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
