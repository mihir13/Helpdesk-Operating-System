<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->increments('id'); //auto incrementing id col
            $table->text('type')->nullable(); //nullable type col
            $table->text('make')->nullable(); //nullable make col
            $table->text('model')->nullable(); //nullable model col
            $table->softDeletes(); //adds deleted_at, allowing use of soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardware'); //drop hardware table
    }
}
