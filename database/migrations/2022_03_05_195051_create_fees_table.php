<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_enroll_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->double('fee_amount',10,2);
            $table->double('fine_amount',10,2)->default('0');
            $table->double('discount_amount',10,2)->default('0');
            $table->double('paid_amount',10,2);
            $table->date('assign_date');
            $table->date('due_date');
            $table->date('pay_date')->nullable();
            $table->integer('payment_method')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->default('0')->comment('0 Unpaid, 1 Paid, 2 Cancel');
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
        Schema::dropIfExists('fees');
    }
}
