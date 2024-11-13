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
            $table->dropColumn([
                'tipo_de_relacin',
                'tipo_de_documento',
                'nombres_completos',
                'genero',
                'lugar_de_residencia',
                'telfono_celular',
                'ocupacin',
                'ciudad_de_trabajo',
                'telfono_del_trabajo',
                'cargo',
                'sector_econmico_en_el_cual_labora',
                'en_caso_de_contestar_otro_especifique_cual',
                'numero_de_documento_33',
                'apellidos_completos',
                'fecha_de_nacimineto',
                'dirreccin_de_recidencia',
                'correo_electrnico_47',
                'nivel_de_estudio',
                'sitio_de_trabajo',
                'direccin_del_trabajo',
                'profesin',
            ]);
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
            $table->string('tipo_de_relacin')->nullable();
            $table->string('tipo_de_documento')->nullable();
            $table->string('nombres_completos')->nullable();
            $table->string('genero')->nullable();
            $table->string('lugar_de_residencia')->nullable();
            $table->string('telfono_celular')->nullable();
            $table->string('ocupacin')->nullable();
            $table->string('ciudad_de_trabajo')->nullable();
            $table->string('telfono_del_trabajo')->nullable();
            $table->string('cargo')->nullable();
            $table->string('sector_econmico_en_el_cual_labora')->nullable();
            $table->string('en_caso_de_contestar_otro_especifique_cual')->nullable();
            $table->string('numero_de_documento_33')->nullable();
            $table->string('apellidos_completos')->nullable();
            $table->date('fecha_de_nacimineto')->nullable();
            $table->string('dirreccin_de_recidencia')->nullable();
            $table->string('correo_electrnico_47')->nullable();
            $table->string('nivel_de_estudio')->nullable();
            $table->string('sitio_de_trabajo')->nullable();
            $table->string('direccin_del_trabajo')->nullable();
            $table->string('profesin')->nullable();
        });
    }
};
