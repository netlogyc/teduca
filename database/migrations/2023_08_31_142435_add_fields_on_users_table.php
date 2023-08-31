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
        Schema::table('users', function (Blueprint $table) {
            $table->string('type_ide')->nullable();
            $table->string('second_last_name')->nullable();
            $table->string('second_first_name')->nullable();
            $table->date('expedition_date')->nullable();
            $table->string('place_of_birth')->nullable();
            // $table->string('nationality')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('economic_stratum')->nullable();
            $table->string('institutional_e_mail')->unique()->nullable();
            $table->string('eps')->nullable();
            $table->string('habeas_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
