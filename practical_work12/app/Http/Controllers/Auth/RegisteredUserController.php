<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use Telegram\Bot\Laravel\Facades\Telegram; // Импортируйте фасад Telegram
use Illuminate\Routing\Redirector; // Импортируйте Redirector

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Отправка письма
        try {
            Mail::to($user->email)->send(new Welcome($user));
        } catch (\Exception $e) {
            \Log::error('Ошибка отправки приветственного письма: ' . $e->getMessage());
        }


        // Отправка уведомления в Telegram
        $telegramChatId = env('TELEGRAM_CHANNEL_ID');
        if ($telegramChatId) {
            try {
                Telegram::sendMessage([
                    'chat_id' => $telegramChatId,
                    'parse_mode' => 'html',
                    'text' => "Новый пользователь зарегистрирован: <b>{$user->name}</b> ({$user->email})"
                ]);
            } catch (\Exception $e) {
                // Обработка ошибок отправки в Telegram (например, логирование)
                \Log::error('Ошибка отправки сообщения в Telegram: ' . $e->getMessage());
            }
        } else {
            \Log::warning('TELEGRAM_CHANNEL_ID не установлен в .env');
        }


        return redirect(RouteServiceProvider::HOME);
    }
}