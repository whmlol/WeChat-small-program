<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chat_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_icon',550)->nullable();
            $table->string('user_name',45)->nullable();
            $table->unsignedTinyInteger('user_age')->nullable();
            $table->unsignedTinyInteger('user_sex')->comment('0未知 1男 2女')->default(0);
            $table->string('user_tel',45)->nullable();
            $table->string('user_province',45)->nullable();
            $table->string('user_city',45)->nullable();
            $table->string('user_area',45)->nullable();
            $table->string('user_openid',45);
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
        Schema::dropIfExists('we_chat_users');
    }
}
