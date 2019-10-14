<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->string('id'); //string id for alphanumeric staff id
            $table->primary('id'); //set id to primary key
            $table->text('first_name'); //col for person's first name
            $table->text('last_name'); //col for person's last name
            $table->text('job_title'); //col for job title
            $table->unsignedInteger('dept_id'); //col for dept id
            $table->text('tel_no'); //col for telephone number
            $table->foreign('dept_id')->references('id')->on('departments')
                  ->onUpdate('cascade'); //foreign key relationship to departments table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel'); // drop the personnel table
    }
}
