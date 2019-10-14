<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_types', function (Blueprint $table) {
            $table->increments('id'); //auto incrementing id
            $table->unsignedInteger('parent')->nullable(); //nullable reference to parent problem id
            $table->text('name'); //problem name
            $table->foreign('parent')
                  ->references('id')->on('problem_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); //foreign key relationship to this same table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_types'); //drop problem types table
    }
}
