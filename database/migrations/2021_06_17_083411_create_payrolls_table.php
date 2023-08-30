<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->double('basic_salary',10,2)->default('0');
            $table->integer('salary_type')->default('1')->comment('1 Fixed & 2 Hourly');
            $table->double('total_earning',10,2);
            $table->double('total_allowance',10,2)->default('0');
            $table->double('bonus',10,2)->default('0');
            $table->double('total_deduction',10,2)->default('0');
            $table->double('gross_salary',10,2);
            $table->double('tax',10,2)->default('0');
            $table->double('net_salary',10,2);
            $table->date('salary_month');
            $table->date('pay_date')->nullable();
            $table->integer('payment_method')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->default('0')->comment('0 Unpaid, 1 Paid');
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
        Schema::dropIfExists('payrolls');
    }
}
