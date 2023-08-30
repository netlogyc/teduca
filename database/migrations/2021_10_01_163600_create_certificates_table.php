<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('template_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('serial_no')->nullable();
            $table->date('date');
            $table->string('starting_year')->nullable();
            $table->string('ending_year')->nullable();
            $table->decimal('credits',5,2);
            $table->decimal('point',5,2);
            $table->string('barcode')->nullable();
            $table->boolean('status')->default('1');
            
            $table->foreign('template_id')
                  ->references('id')->on('certificate_templates')
                  ->onDelete('cascade');
            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('certificates');
    }
}
