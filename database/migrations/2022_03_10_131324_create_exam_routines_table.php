<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('exam_type_id')->unsigned();
            $table->integer('session_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('status')->default('1');

            $table->foreign('exam_type_id')->references('id')->on('exam_types')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('exam_routines');
    }
}
