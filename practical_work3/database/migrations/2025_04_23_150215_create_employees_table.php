<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Создает первичный ключ (id)
            $table->string('name'); // Создает столбец 'name'
            $table->string('position'); // Создает столбец 'position'
            $table->timestamps(); // Создает временные метки 'created_at' и 'updated_at'
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};