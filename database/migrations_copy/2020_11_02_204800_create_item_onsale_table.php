<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemOnsaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_onsale', function (Blueprint $table) {
            $table->id();
            $table->string('item_id')->nullable();
            $table->string('sale_type')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('sale_start')->nullable();
            $table->string('sale_end')->nullable();
            $table->string('sale_status')->nullable();
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
        Schema::dropIfExists('item_onsale');
    }
}
