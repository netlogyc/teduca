<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reference_id')->unsigned()->nullable();
            $table->integer('source_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->text('purpose')->nullable();
            $table->text('note')->nullable();
            $table->date('date');
            $table->date('follow_up_date')->nullable();
            $table->string('assigned')->nullable();
            $table->integer('number_of_students')->default('1');
            $table->integer('status')->default('1')->comment('0 Closed, 1 Pending, 2 Progress, 3 Resolved');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
