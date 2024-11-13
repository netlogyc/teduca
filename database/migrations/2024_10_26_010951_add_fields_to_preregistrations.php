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
        Schema::table('preregistrations', function (Blueprint $table) {
            $table->string('modalidad')->nullable();
            $table->string('metodologia')->nullable();
            $table->string('periodo_academico')->nullable();
            $table->string('horario')->nullable();
            $table->string('genero')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('ciudad_nacimiento')->nullable();
            $table->string('eps')->nullable();
            $table->string('libreta_militar')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('school_name')->nullable();
            $table->string('titulo_obtenido')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('nombre_convive')->nullable();
            $table->string('convive_type')->nullable();
            $table->string('convive_document')->nullable();
            $table->string('document_convive')->nullable();
            $table->string('tel_convive')->nullable();
            $table->string('email_convive')->nullable();
            $table->string('ocupacion_convive')->nullable();
            $table->string('convive_estudio')->nullable();
            $table->string('ciudad_trabajo__convive')->nullable();
            $table->string('sitio_trabajo__convive')->nullable();
            $table->string('telefono_trabajo__convive')->nullable();
            $table->string('direccion_trabajo__convive')->nullable();
            $table->string('cargo_convive')->nullable();
            $table->string('profesion_convive')->nullable();
            $table->string('cash_month')->nullable();
            $table->string('economic')->nullable();
            $table->string('economic_person')->nullable();
            $table->string('personal_economic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preregistrations', function (Blueprint $table) {
            
            
        });
    }
};
