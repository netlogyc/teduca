<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('review_by')->unsigned()->nullable();
            $table->date('apply_date');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('subject')->nullable();
            $table->text('reason')->nullable();
            $table->text('attach')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->default('0')->comment('0 Pending, 1 Approved and 2 Rejected');
            $table->timestamps();

            $table->foreign('student_id')
                    ->references('id')->on('students')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_leaves');
    }
}
