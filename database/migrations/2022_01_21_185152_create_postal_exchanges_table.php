<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostalExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_exchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type')->comment('1 Import & 2 Export');;
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->text('reference')->nullable();
            $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->text('note')->nullable();
            $table->date('date')->nullable();
            $table->text('attach')->nullable();
            $table->integer('status')->default('1')->comment('1 On Hold, 2 Progress, 3 Received, 0 Delivered');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('category_id')
                  ->references('id')->on('postal_exchange_types')
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
        Schema::dropIfExists('postal_exchanges');
    }
}
