<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems_software', function (Blueprint $table) {
            $table->unsignedInteger('id'); //id col
            $table->primary('id'); //make id primary key
            $table->text('os')->nullable(); //nullable operating system name column
            $table->unsignedInteger('software')->nullable(); //nullable software id col
            $table->foreign('id')->references('id')->on('problems')->onUpdate('cascade')->onDelete('cascade'); //foreign key to problems table
            $table->foreign('software')->references('id')->on('software')->onUpdate('cascade'); //foreign key to software table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems_software'); //drop problems_software table
    }
}
