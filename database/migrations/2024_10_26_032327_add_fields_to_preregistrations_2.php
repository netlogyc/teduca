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
            $table->string('blood_group')->nullable();
            $table->string('alergias')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('permanent_province')->nullable();
            $table->string('permanent_district')->nullable();
            
            
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
            //
        });
    }
};
