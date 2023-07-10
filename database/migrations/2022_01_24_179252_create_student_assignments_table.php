<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_enroll_id')->unsigned();
            $table->bigInteger('assignment_id')->unsigned();
            $table->decimal('marks',5,2)->nullable();
            $table->integer('attendance')->nullable();
            $table->date('date')->nullable();
            $table->text('attach')->nullable();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('student_enroll_id')->references('id')->on('student_enrolls')->onDelete('cascade');
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assignments');
    }
}
