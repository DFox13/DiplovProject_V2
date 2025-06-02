<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('main_menu_items', function (Blueprint $table) {
        $table->boolean('show_on_home')->default(false);
        $table->boolean('show_on_services')->default(false);
        $table->boolean('show_on_dentists')->default(false);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_menu_items', function (Blueprint $table) {
            //
        });
    }
};
