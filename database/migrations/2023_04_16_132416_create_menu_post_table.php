<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_post', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnUpdate();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
            
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus')->cascadeOnUpdate();
            
            $table->unsignedBigInteger('price_id');
            $table->foreign('price_id')->references('id')->on('prices')->cascadeOnUpdate();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_post');
    }
};
