<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_fines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('start_day');
            $table->integer('end_day');
            $table->decimal('amount',10,2);
            $table->integer('type')->default('1')->comment('1 Fixed, 2 Percentage');
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
        Schema::dropIfExists('fees_fines');
    }
}
