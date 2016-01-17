<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTshirtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tshirt', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('tshirt_id')->unsigned();
            $table->double('price');
            $table->integer('quantity')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('tshirt_id')->references('id')->on('tshirts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_tshirt');
    }
}
