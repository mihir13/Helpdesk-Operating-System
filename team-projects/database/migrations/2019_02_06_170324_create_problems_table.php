<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id'); //auto incrementing problem id (this will be the problem reference number)
            $table->unsignedInteger('type'); //problem type id
            $table->longText('description')->nullable(); //problem description text field (nullable)
            $table->longText('solution')->nullable(); //problem solution text field (nullable)
            $table->boolean('solved')->default(0); //boolean solved flag - true if problem is solved
            $table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP')); //created timestamp, automatically set on row creation
            $table->timestamp('edited')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP')); //edited timestamp, automatically set on row update
            $table->timestamp('completed')->nullable(); //completed timestamp, needs to manually set when problem is marked as completed
            $table->string('specialist')->nullable(); //specialist id
            $table->foreign('type')
                  ->references('id')->on('problem_types')
                  ->onUpdate('cascade'); //foreign key on problem types
            $table->foreign('specialist')
                  ->references('id')->on('personnel')
                  ->onUpdate('cascade'); //foreign key on personnel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems'); //drop problems table
    }
}
