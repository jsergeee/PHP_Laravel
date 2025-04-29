<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            // Первичный ключ
            $table->id();
            
            // Название книги
            $table->string('title')->unique(); // Уникальное значение
            
            // Имя автора
            $table->string('author', 100); // Ограничиваем длину до 100 символов
            
            // Жанр книги
            $table->enum('genre', ['fiction', 'non-fiction', 'sci-fi', 'mystery']);
            
            // Дата создания и обновления
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
