<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('order_id',13);
            $table->integer('user_id')->unsigned();
            $table->double('net_price');
            $table->integer('order_status');
            // $table->string('coupon_code',20);
            $table->date('order_date');
            $table->string('address',300);
            $table->string('tel_number',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
