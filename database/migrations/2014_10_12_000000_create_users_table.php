<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_online', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();            
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('users_register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');  
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
        Schema::drop('users');
    }
}
