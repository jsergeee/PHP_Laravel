<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;

class DataLogger
{
    private $start_time;

    public function handle($request, Closure $next)
    {
        \Log::info('DataLogger handle вызван');
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        \Log::info('DataLogger terminate вызван');
        if (env('API_DATALOGGER', true)) {
            if (env('API_DATALOGGER_USE_DATABASE', true)) {
                $endTime = microtime(true);
                $log = new Log();
                $log->time = date('Y-m-d H:i:s');
                $log->duration = number_format($endTime - LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            } else {
                // Логирование в файл
                $filename = microtime(true) . '.log';
                $endTime = microtime(true);
                $dataLog = "Time: " . date('Y-m-d H:i:s') . "\n";
                $dataLog .= "Duration: " . number_format($endTime - $this->start_time, 3) . " seconds\n";
                $dataLog .= "IP: " . $request->ip() . "\n";
                $dataLog .= "URL: " . $request->fullUrl() . "\n";
                $dataLog .= "Method: " . $request->method() . "\n";
                $dataLog .= "Input: " . $request->getContent() . "\n";

                file_put_contents(storage_path('logs') . DIRECTORY_SEPARATOR . $filename, $dataLog);
            }
        }
    }
}