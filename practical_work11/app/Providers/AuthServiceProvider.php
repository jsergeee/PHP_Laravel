<?php

namespace App\Providers;

use App\Models\User; // Импортируем модель User
use App\Policies\UserPolicy; // Импортируем политику UserPolicy
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy', // Пример, если он есть
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}