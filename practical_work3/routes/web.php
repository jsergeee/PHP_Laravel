<?php

use App\Models\Employee;

Route::get('/test_database', function () {
    // Создаем новый экземпляр модели Employee
    $employee = new Employee();
    
    // Задаем значения для полей
    $employee->name = 'John Doe';
    $employee->position = 'Developer';
    
    // Сохраняем экземпляр в базе данных
    $employee->save();

    return 'Employee created successfully: ' . $employee->name . ', Position: ' . $employee->position;

});

