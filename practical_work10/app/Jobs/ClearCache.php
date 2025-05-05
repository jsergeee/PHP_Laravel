<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log; // Добавьте эту строку

class ClearCache implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('ClearCache Job начал выполнение.'); // Добавьте эту строку

        try {
            Artisan::call('cache:clear');
            Log::info('Команда cache:clear успешно выполнена.'); // Добавьте эту строку
        } catch (\Exception $e) {
            Log::error('Ошибка при выполнении cache:clear: ' . $e->getMessage()); // Добавьте эту строку
        }

        Log::info('ClearCache Job завершил выполнение.'); // Добавьте эту строку
    }
}