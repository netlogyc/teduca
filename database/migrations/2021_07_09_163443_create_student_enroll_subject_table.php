<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrollSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enroll_subject', function (Blueprint $table) {
            $table->bigInteger('student_enroll_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();

            $table->foreign('student_enroll_id')->references('id')->on('student_enrolls')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_enroll_subject');
    }
}
