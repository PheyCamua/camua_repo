<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('category_id')->nullable(); 
            $table->string('item_name')->nullable();
            $table->string('item_tags')->nullable();

            $table->string('item_code')->nullable();
            $table->string('item_qty')->nullable();
            $table->string('item_model')->nullable();
            $table->string('item_brand')->nullable();  

            $table->string('item_status')->nullable(); 

            $table->string('price_new')->nullable();
            $table->string('price_old')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('discount_start')->nullable();
            $table->string('discount_end')->nullable(); 

            $table->string('user_id')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
