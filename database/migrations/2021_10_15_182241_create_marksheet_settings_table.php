<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksheetSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marksheet_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
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
            $table->string('width')->default('auto');
            $table->string('height')->default('auto');
            $table->boolean('student_photo')->default('0');
            $table->boolean('barcode')->default('0');
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
        Schema::dropIfExists('marksheet_settings');
    }
}
