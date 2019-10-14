<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //auto incrementing id col
            $table->string('username')->unique(); //unique username column (matches user's person id)
            $table->string('password'); //password col (passwords are hashed using bcrypt)
            $table->rememberToken(); //token col for people who tick 'remember me'
            $table->timestamps(); //timestamp columns
            $table->foreign('username')
                  ->references('id')->on('personnel')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); //foreign key on personnel table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); //drop users table
    }
}
