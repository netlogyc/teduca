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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preregistration_id');
            $table->string('metas_profesionales_mediano_plazo')->nullable();
            $table->string('metas_profesionales_largo_plazo')->nullable();
            $table->string('metas_personales_mediano_plazo')->nullable();
            $table->string('metas_personales_largo_plazo')->nullable();
            $table->string('cuales_son_sus_fortalezas')->nullable();
            $table->string('cuales_son_sus_debilidades')->nullable();
            $table->string('como_convertiria_debilidades_en_fortalezas')->nullable();
            $table->string('hace_cuando_termino_educacion_media')->nullable();
            $table->string('cuales_materias_se_dificultaban')->nullable();
            $table->string('cuales_materias_le_agradaban')->nullable();
            $table->string('que_le_gusta_en_tiempo_libre')->nullable();
            $table->string('que_le_motivo_elegir')->nullable();
            $table->string('cual_es_el_campo_accion')->nullable();
            $table->string('que_perspectiva_profesional_tiene')->nullable();
            $table->string('cual_seria_su_aporte')->nullable();
            $table->string('que_otras_instituciones_educativas')->nullable();
            $table->string('conoce_el_valor_de_carrera')->nullable();
            $table->string('cuales_opciones_de_grado')->nullable();
            $table->string('por_que_quiere_estudiar_ctb')->nullable();
            $table->string('cuales_son_sus_expectativas')->nullable();
            $table->string('porque_deberiamos_aceptarlo')->nullable();
            $table->string('como_contribuiria_al_crecimiento')->nullable();
            $table->timestamps();
            

           
            $table->foreign('preregistration_id')->references('id')->on('preregistrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
};
