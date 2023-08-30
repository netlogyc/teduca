<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('code')->unique();
            $table->string('credit_hour');
            $table->integer('subject_type')->default('1')->comment('0 Optional & 1 Compulsory');
            $table->integer('class_type')->default('1')->comment('1 Theory, 2 Practical & 3 Both');
            $table->decimal('total_marks',5,2)->nullable();
            $table->decimal('passing_marks',5,2)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('subjects');
    }
}
