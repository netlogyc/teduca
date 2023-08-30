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
        Schema::table('subjects', function (Blueprint $table) {
            
            $table->double('field_intensity')->nullable();
            $table->double('theoretical_unit')->nullable();
            $table->double('practical_unit')->nullable();
            $table->double('minimum_note')->nullable();
            $table->double('maximum_note')->nullable();
            $table->double('passing_grade')->nullable();
            $table->string('homologable')->nullable();
            $table->double('minimum_grade_approved')->nullable();
            $table->date('field_start')->nullable();
            $table->date('field_ends')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            //
        });
    }
};
