<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('review_by')->unsigned()->nullable();
            $table->date('apply_date');
            $table->date('from_date');
            $table->date('to_date');
            $table->text('reason')->nullable();
            $table->text('attach')->nullable();
            $table->text('note')->nullable();
            $table->integer('pay_type')->default('1')->comment('1 Paid & 2 Unpaid');
            $table->integer('status')->default('0')->comment('0 Pending, 1 Approved and 2 Rejected');
            $table->timestamps();

            $table->foreign('type_id')
                    ->references('id')->on('leave_types')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
