<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_nos', function (Blueprint $table) {
            $table->string('serial_no'); //allows alphanumeric serial numbers
            $table->unsignedInteger('hardware_id'); //hardware reference col
            $table->primary('serial_no'); //set serial number as primary key
            $table->foreign('hardware_id')
                  ->references('id')->on('hardware')
                  ->onUpdate('cascade'); //set foreign key relationship to hardware table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serial_nos'); //drop serial_nos table
    }
}
