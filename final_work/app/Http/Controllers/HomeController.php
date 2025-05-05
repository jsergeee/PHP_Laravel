<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Метод для отображения главной страницы
    public function index()
    {
        return view('home'); // возвращает представление resources/views/home.blade.php
    }
}