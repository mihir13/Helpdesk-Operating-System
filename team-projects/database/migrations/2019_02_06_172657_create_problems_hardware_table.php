<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems_hardware', function (Blueprint $table) {
            $table->unsignedInteger('id'); //reference to problems table
            $table->primary('id'); //make problem id the primary key
            $table->string('serial_no')->nullable(); //make a nullable serial number col
            $table->unsignedInteger('hardware')->nullable(); // nullable hardware id col (needed as not always a serial number)
            $table->foreign('id')->references('id')->on('problems')->onUpdate('cascade')->onDelete('cascade'); //foreign key on problems table
            $table->foreign('serial_no')->references('serial_no')->on('serial_nos')->onUpdate('cascade'); //foreign key on serial numbers table
            $table->foreign('hardware')->references('id')->on('hardware')->onUpdate('cascade'); //foreign key on hardware table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems_hardware'); //drop hardware table
    }
}
