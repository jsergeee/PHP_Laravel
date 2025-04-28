<?php

use App\Http\Controllers\EmployeeController;

Route::get('/employees/create', function () {
    return view('employees.create');
})->name('employees.create');

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
