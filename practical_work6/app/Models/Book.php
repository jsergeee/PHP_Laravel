<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',    // Разрешаем массовое присваивание полю title
        'author',   // Добавляйте сюда остальные разрешенные поля
        'genre',    // и т.д., которые будете массово назначать
    ];
    
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
}
