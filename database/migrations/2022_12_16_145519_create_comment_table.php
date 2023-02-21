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
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin');
            $table->unsignedInteger('idUsers');
            $table->unsignedInteger('id_product');
            $table->timestamps();
            $table->foreign('idUsers')->references('user_id')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('admin')->references('user_id')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
