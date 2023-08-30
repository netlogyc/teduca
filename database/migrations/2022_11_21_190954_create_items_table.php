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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('category_id')->unsigned();
            $table->string('unit')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('quantity')->default('0');
            $table->text('description')->nullable();
            $table->text('attach')->nullable();
            $table->boolean('status')->default('1');
            $table->foreign('category_id')
                  ->references('id')->on('item_categories')
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
        Schema::dropIfExists('items');
    }
};
