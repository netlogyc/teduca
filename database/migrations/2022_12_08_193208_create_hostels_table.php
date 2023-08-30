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
        Schema::create('hostels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('type')->default('0')->comment('1 Boys, 2 Girls, 3 Staff, 4 Combain');
            $table->string('capacity')->nullable();
            $table->string('warden_name')->nullable();
            $table->text('warden_contact')->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('hostels');
    }
};
