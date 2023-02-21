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
        Schema::create('comment_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->unsignedInteger('idComment');
            $table->unsignedInteger('idAuthur');
            $table->boolean('seen')->default(false);
            $table->timestamps();
            $table->foreign('idAuthur')->references('user_id')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idComment')->references('id')->on('comment')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_content');
    }
};
