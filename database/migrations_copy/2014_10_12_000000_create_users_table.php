<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();            
            $table->string('password');
            
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('screenname')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('telno')->nullable();
            $table->string('address')->nullable(); 
            $table->string('user_status')->nullable(); 

            $table->string('bank_account')->nullable();
            $table->string('bank_accountname')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();

            $table->string('post_limit')->nullable();
            
            $table->string('user_type')->nullable();

            $table->timestamp('user_agreement')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
