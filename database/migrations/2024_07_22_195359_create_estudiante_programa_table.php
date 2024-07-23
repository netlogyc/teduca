<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_programa', function (Blueprint $table) {
            $table->id();
            $table->integer('estudiante_id')->unsigned()->nullable();
            $table->integer('batch_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            // Otros campos adicionales que desees para esta relación
            $table->timestamps();

            // $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            // $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante_programa');
    }
};
