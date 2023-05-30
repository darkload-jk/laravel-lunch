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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('month_fee')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade');
            $table->foreign('price_id')->references('id')->on('prices')->onUpdate('cascade');
            // $table->foreign('month_fee')->references('month_fee')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('posts');
    }
};
