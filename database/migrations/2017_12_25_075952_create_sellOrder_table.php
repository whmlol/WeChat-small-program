<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sell_name',45);
            $table->string('sell_tel',45)->nullable();
            $table->unsignedTinyInteger('sell_sex')->comment('0未知 1男 2女');
            $table->string('sell_city',45);
            $table->string('sell_description',550)->nullable();
            $table->string('sell_photo',550);
            $table->unsignedTinyInteger('sell_age');
            $table->decimal('sell_height',4,1);
            $table->decimal('sell_weight',4,1);
            $table->string('sell_wechat_number',45)->comment('被卖人微信号');
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
        Schema::dropIfExists('sell_orders');
    }
}
