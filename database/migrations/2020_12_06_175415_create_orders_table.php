<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('post_id');
            $table->string('order_variation')->nullable(); //color size
            $table->string('order_qty');
            $table->string('order_price'); // current price on ordered
            $table->string('order_by_id'); // registered user id
            
            //UNREGISTERED
            $table->string('order_by_name'); 
            $table->string('order_by_phone'); 
            $table->string('order_by_address'); 

            $table->string('order_date'); 
            $table->string('tracking_id'); 
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
        Schema::dropIfExists('orders');
    }
}
