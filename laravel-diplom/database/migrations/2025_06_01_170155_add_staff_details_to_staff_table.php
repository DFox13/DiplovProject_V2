<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStaffDetailsToStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->string('first_name')->nullable(); // Имя
            $table->string('last_name')->nullable(); // Фамилия
            $table->string('middle_name')->nullable(); // Отчество
            $table->string('position')->nullable(); // Должность
            $table->string('image_path')->nullable(); // Путь к изображению
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'middle_name', 'position', 'image_path']);
        });
    }
}