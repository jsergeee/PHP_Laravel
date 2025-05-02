<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Отображение формы для создания нового пользователя
    public function create()
    {
        return view('user_form');
    }

    // Получение всех пользователей
    public function index()
    {
        $users = User::all();
        return response()->json($users); // Возврат данных в формате JSON
        // Или из представления
        // return view('users.index', compact('users'));
    }

    // Получение одного пользователя по ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
        // Или из представления
        // return view('users.show', compact('user'));
    }

    // Сохранение нового пользователя в БД
    public function store(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
        ]);

        // Логируем данные для проверки
        \Log::info($request->all());

        // Создание нового пользователя
        User::create($request->all());

        // Перенаправление к списку пользователей или к форме
        return redirect('/users')->with('success', 'Пользователь создан успешно.');
    }
}
