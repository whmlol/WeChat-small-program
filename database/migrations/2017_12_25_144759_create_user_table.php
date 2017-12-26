<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name',45);
            $table->string('user_openid',45);
            $table->string('user_tel',45)->nullable();
            $table->unsignedTinyInteger('user_sex')->comment('0未知 1男 2女');
            $table->string('user_icon',550);
            $table->string('user_province',45);
            $table->string('user_city',45);
            $table->string('user_area',45);
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
        Schema::dropIfExists('user');
    }
}
