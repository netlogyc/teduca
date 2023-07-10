<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('program_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->boolean('status')->default('1');
            
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('enroll_subjects');
    }
}
