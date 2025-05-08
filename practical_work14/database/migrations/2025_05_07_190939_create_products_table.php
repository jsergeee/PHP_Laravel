<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Это должно быть первым, так как это первичный ключ
            $table->string('sku')->unique(); // Добавим unique для SKU
            $table->string('name');
            $table->integer('category_id')->unsigned()->nullable(); // Определяем столбец как INT UNSIGNED
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Определяем внешний ключ вручную
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
