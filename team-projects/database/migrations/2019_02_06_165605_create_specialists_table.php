<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialists', function (Blueprint $table) {
            $table->increments('id'); //auto incrementing id col
            $table->string('person_id'); //id of specialist
            $table->unsignedInteger('specialism'); //id of problem type specialised in
            $table->foreign('person_id')
                  ->references('id')->on('personnel')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); //foreign key relationship to person
            $table->foreign('specialism')
                  ->references('id')->on('problem_types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); //foreign key relationship to problem types
            $table->unique(['person_id', 'specialism']); //add a unique key to prevent duplication of specialisms (this way a composite key is not required which suits eloquent)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialists'); //drop specialists table
    }
}
