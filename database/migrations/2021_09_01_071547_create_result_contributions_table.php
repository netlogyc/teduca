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
        Schema::create('result_contributions', function (Blueprint $table) {
            $table->id();
            $table->decimal('attendances',5,2)->default('0');
            $table->decimal('assignments',5,2)->default('0');
            $table->decimal('activities',5,2)->default('0');
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
        Schema::dropIfExists('result_contributions');
    }
};
