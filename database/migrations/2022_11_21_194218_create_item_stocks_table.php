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
        Schema::create('item_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('quantity')->default('1');
            $table->decimal('price',10,2)->nullable();
            $table->date('date');
            $table->string('reference')->nullable();
            $table->integer('payment_method')->nullable();
            $table->text('description')->nullable();
            $table->text('attach')->nullable();
            $table->boolean('status')->default('1');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('item_id')
                  ->references('id')->on('items')
                  ->onDelete('cascade');
            $table->foreign('store_id')
                  ->references('id')->on('item_stores')
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
        Schema::dropIfExists('item_stocks');
    }
};
