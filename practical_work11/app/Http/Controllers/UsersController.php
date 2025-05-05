<?php

namespace App\Http\Controllers;

use App\Models\User; // Импортируем модель User
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // <-- ДОБАВЬТЕ ЭТУ СТРОКУ

class UsersController extends Controller
{
    use AuthorizesRequests; // <-- ДОБАВЬТЕ ЭТУ СТРОКУ

    public function index()
    {
        // Здесь будет использоваться авторизация
        $this->authorize('view-any', User::class);

        $users = User::all(); // Получаем всех пользователей
        return view('users.index', compact('users')); // Предполагается, что у вас есть представление users/index.blade.php
    }
}