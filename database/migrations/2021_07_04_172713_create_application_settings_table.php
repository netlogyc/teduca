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
        Schema::create('application_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->text('title')->nullable();
            $table->text('header_left')->nullable();
            $table->text('header_center')->nullable();
            $table->text('header_right')->nullable();
            $table->text('body')->nullable();
            $table->text('footer_left')->nullable();
            $table->text('footer_center')->nullable();
            $table->text('footer_right')->nullable();
            $table->text('logo_left')->nullable();
            $table->text('logo_right')->nullable();
            $table->text('background')->nullable();
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
        Schema::dropIfExists('application_settings');
    }
};
