<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('faculty_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('session_id')->unsigned()->nullable();
            $table->integer('semester_id')->unsigned()->nullable();
            $table->integer('section_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->string('notice_no')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->text('attach')->nullable();
            $table->boolean('status')->default('1');
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->timestamps();
            
            $table->foreign('category_id')
                  ->references('id')->on('notice_categories')
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
        Schema::dropIfExists('notices');
    }
}
