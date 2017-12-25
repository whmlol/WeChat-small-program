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
            $table->varchar('user_name',45);
            $table->varchar('user_openid',45);
            $table->varchar('user_tel',45)->nullable();
            $table->unsignedTinyInteger('user_sex')->comment('0未知 1男 2女');
            $table->varchar('user_icon',550);
            $table->varchar('user_province',45);
            $table->varchar('user_city',45);
            $table->varchar('user_area',45);
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
