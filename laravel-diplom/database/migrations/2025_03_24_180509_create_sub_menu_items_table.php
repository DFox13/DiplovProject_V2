<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenuItemsTable extends Migration
{
    public function up()
    {
        Schema::create('sub_menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_menu_item_id'); 
            $table->string('title');
            $table->timestamps();

            $table->foreign('main_menu_item_id')
                  ->references('id')
                  ->on('main_menu_items')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_menu_items');
    }
}
