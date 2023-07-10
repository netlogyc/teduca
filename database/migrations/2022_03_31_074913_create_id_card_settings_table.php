<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdCardSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_card_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('logo')->nullable();
            $table->text('background')->nullable();
            $table->string('website_url')->nullable();
            $table->string('validity')->nullable();
            $table->text('address')->nullable();
            $table->boolean('student_photo')->default('0');
            $table->boolean('signature')->default('0');
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
        Schema::dropIfExists('id_card_settings');
    }
}
