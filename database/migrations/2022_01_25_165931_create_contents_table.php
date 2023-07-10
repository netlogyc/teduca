<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('faculty_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('session_id')->unsigned()->nullable();
            $table->integer('semester_id')->unsigned()->nullable();
            $table->integer('section_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->text('url')->nullable();
            $table->text('attach')->nullable();
            $table->boolean('status')->default('1');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('type_id')
                    ->references('id')->on('content_types')
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
        Schema::dropIfExists('contents');
    }
}
