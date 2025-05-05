<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRoleIdFromUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Удаляем внешний ключ
            $table->dropForeign(['role_id']);

            // Удаляем столбец role_id
            $table->dropColumn('role_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Восстановление столбца, если нужно
            $table->unsignedBigInteger('role_id')->nullable();

            // Восстановление внешнего ключа
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}