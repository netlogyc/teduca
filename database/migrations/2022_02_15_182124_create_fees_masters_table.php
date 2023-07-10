<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->integer('faculty_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('session_id')->unsigned()->nullable();
            $table->integer('semester_id')->unsigned()->nullable();
            $table->integer('section_id')->unsigned()->nullable();
            $table->decimal('amount',10,2);
            $table->integer('type')->default('1')->comment('1 Fixed, 2 Per Credit');
            $table->date('assign_date');
            $table->date('due_date');
            $table->boolean('status')->default('1');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('fees_masters');
    }
}
