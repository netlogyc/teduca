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
        Schema::create('transport_route_transport_vehicle', function (Blueprint $table) {
            $table->integer('transport_route_id')->unsigned();
            $table->integer('transport_vehicle_id')->unsigned();

            $table->foreign('transport_route_id')->references('id')->on('transport_routes')->onDelete('cascade');
            $table->foreign('transport_vehicle_id')->references('id')->on('transport_vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_route_transport_vehicle');
    }
};
