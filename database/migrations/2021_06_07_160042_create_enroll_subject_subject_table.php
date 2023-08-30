<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollSubjectSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll_subject_subject', function (Blueprint $table) {
            $table->bigInteger('enroll_subject_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();

            $table->foreign('enroll_subject_id')->references('id')->on('enroll_subjects')->onDelete('cascade');
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
        Schema::dropIfExists('enroll_subject_subject');
    }
}
