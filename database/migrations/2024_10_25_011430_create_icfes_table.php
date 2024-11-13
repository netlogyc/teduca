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
        Schema::create('icfes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('icfes_snp')->nullable();
            $table->string('icfes_date')->nullable();
            $table->string('icfes_type')->nullable();
            $table->string('icfes_file')->nullable();
            $table->string('icfes_total')->nullable();

            $table->bigInteger('preregistration_id')->unsigned();
            $table->foreign('preregistration_id')->references('id')->on('preregistrations')->onDelete('cascade');



          
            
       

            



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icfes');
    }
};
