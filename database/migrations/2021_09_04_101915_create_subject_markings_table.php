<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectMarkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_markings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_enroll_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->decimal('exam_marks',5,2)->nullable();
            $table->decimal('attendances',5,2)->nullable();
            $table->decimal('assignments',5,2)->nullable();
            $table->decimal('activities',5,2)->nullable();
            $table->decimal('total_marks',5,2)->nullable();
            $table->date('publish_date')->nullable();
            $table->time('publish_time')->nullable();
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
        Schema::dropIfExists('subject_markings');
    }
}
