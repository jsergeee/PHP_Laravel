<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Показать форму входа для обычных пользователей
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // создайте соответствующее представление
    }

    /**
     * Обработка входа пользователя
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Валидация данных формы
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Попытка авторизации
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Перенаправление на защищённую страницу
            return redirect()->intended(route('admin.dashboard'));
        }

        // Если авторизация не удалась, возвращаемся назад с ошибкой
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ])->withInput();
    }

    /**
     * Выйти из системы
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Показать форму входа для администратора
     *
     * @return \Illuminate\View\View
     */
    public function showAdminLoginForm()
    {
        return view('admin.login'); // создайте представление admin.login
    }

    /**
     * Обработка входа администратора
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminLogin(Request $request)
    {
        // Валидация данных формы
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Попытка авторизации с проверкой роли или других условий, при необходимости
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Перенаправление на страницу админки
            return redirect()->intended(route('admin.dashboard'));
        }

        // Неудачная авторизация
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ])->withInput();
    }
}