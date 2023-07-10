<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRoutineRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_routine_room', function (Blueprint $table) {
            $table->bigInteger('exam_routine_id')->unsigned();
            $table->integer('room_id')->unsigned();

            $table->foreign('exam_routine_id')->references('id')->on('exam_routines')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('class_rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_routine_room');
    }
}
