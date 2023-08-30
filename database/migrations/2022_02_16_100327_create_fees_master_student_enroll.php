<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesMasterStudentEnroll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_master_student_enroll', function (Blueprint $table) {
            $table->bigInteger('fees_master_id')->unsigned();
            $table->bigInteger('student_enroll_id')->unsigned();

            $table->foreign('fees_master_id')->references('id')->on('fees_masters')->onDelete('cascade');
            $table->foreign('student_enroll_id')->references('id')->on('student_enrolls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_master_student_enroll');
    }
}
