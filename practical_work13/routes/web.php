<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome'); // Или другое представление
});

Route::get('/up', function () {
    return response('OK', 200);
});