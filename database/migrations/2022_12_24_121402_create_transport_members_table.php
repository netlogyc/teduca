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
        Schema::create('transport_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('transportable');
            $table->integer('transport_route_id')->unsigned();
            $table->integer('transport_vehicle_id')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->default('1')->comment('0 Inactive, 1 Active');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('transport_route_id')
                  ->references('id')->on('transport_routes')
                  ->onDelete('cascade');
            $table->foreign('transport_vehicle_id')
                  ->references('id')->on('transport_vehicles')
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
        Schema::dropIfExists('transport_members');
    }
};
