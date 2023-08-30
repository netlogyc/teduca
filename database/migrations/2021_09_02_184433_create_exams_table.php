<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_enroll_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->integer('exam_type_id')->unsigned()->nullable();
            $table->integer('attendance')->default('2')->comment('1-Present, 2-Absent');
            $table->decimal('marks',5,2)->nullable();
            $table->decimal('achieve_marks',5,2)->nullable();
            $table->decimal('contribution',5,2)->default('0');
            $table->text('note')->nullable();
            $table->boolean('status')->default('1');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('exams');
    }
}
