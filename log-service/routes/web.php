<?php

use Illuminate\Support\Facades\Route;

Route::get('/logs', function () {
    return view('logs');
});
