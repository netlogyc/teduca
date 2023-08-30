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
        Schema::create('item_issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('quantity')->default('1');
            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('return_date')->nullable();
            $table->double('penalty',10,2)->nullable();
            $table->text('note')->nullable();
            $table->text('attach')->nullable();
            $table->integer('status')->default('1')->comment('0 Lost, 1 Issued, 2 Returned');
            $table->bigInteger('issued_by')->unsigned()->nullable();
            $table->bigInteger('received_by')->unsigned()->nullable();
            $table->foreign('item_id')
                  ->references('id')->on('items')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('item_issues');
    }
};
