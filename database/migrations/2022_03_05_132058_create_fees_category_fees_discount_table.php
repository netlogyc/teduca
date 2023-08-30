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
        Schema::create('fees_category_fees_discount', function (Blueprint $table) {
            $table->integer('fees_category_id')->unsigned();
            $table->integer('fees_discount_id')->unsigned();

            $table->foreign('fees_category_id')->references('id')->on('fees_categories')->onDelete('cascade');
            $table->foreign('fees_discount_id')->references('id')->on('fees_discounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_category_fees_discount');
    }
};
