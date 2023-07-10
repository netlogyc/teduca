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
        Schema::create('transport_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('capacity')->nullable();
            $table->string('year_made')->nullable();
            $table->string('driver_name')->nullable();
            $table->text('driver_license')->nullable();
            $table->text('driver_contact')->nullable();
            $table->text('note')->nullable();
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('transport_vehicles');
    }
};
