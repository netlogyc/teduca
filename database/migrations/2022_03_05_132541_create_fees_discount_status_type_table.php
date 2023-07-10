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
        Schema::create('fees_discount_status_type', function (Blueprint $table) {
            $table->integer('fees_discount_id')->unsigned();
            $table->integer('status_type_id')->unsigned();

            $table->foreign('fees_discount_id')->references('id')->on('fees_discounts')->onDelete('cascade');
            $table->foreign('status_type_id')->references('id')->on('status_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_discount_status_type');
    }
};
