<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        // Получаем данные из формы
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'surname' => 'required',
            'position' => 'required',
            'address' => 'required',
            'json_data' => 'required|json' // Добавлено требование, чтобы данные были в формате JSON
        ]);

        // Преобразуем JSON в массив
        $jsonData = json_decode($request->input('json_data'), true);

        // Создаем новые переменные
        $info = $jsonData['info'];
        $skills = $jsonData['skills'];
        $experience = $jsonData['experience'];

        // Создаем нового сотрудника
        Employee::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'surname' => $validatedData['surname'],
            'position' => $validatedData['position'],
            'address' => $validatedData['address'],
            'json_data' => $jsonData // Сохраняем JSON-данные в базе данных
        ]);
        

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function index()
    {
        // Получаем всех сотрудников из модели Employee
        $employees = Employee::all();

        // Передаем сотрудников в представление
        return view('employees.index', ['employees' => $employees]);
    }

    public function update(Request $request, $id)
    {
        // Получаем данные из формы
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'surname' => 'required',
            'position' => 'required',
            'address' => 'required',
            'json_data' => 'required|json' // Добавлено требование, чтобы данные были в формате JSON
        ]);

        // Преобразуем JSON в массив
        $jsonData = json_decode($request->input('json_data'), true);

        // Обновляем данные сотрудника
        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'surname' => $validatedData['surname'],
            'position' => $validatedData['position'],
            'address' => $validatedData['address'],
            'json_data' => $jsonData // Сохраняем JSON-данные в базе данных
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

}