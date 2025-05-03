<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Метод для отображения административной панели
    public function index()
    {
        return view('admin.dashboard'); // возвращает view resources/views/admin/dashboard.blade.php
    }
}
