<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('member_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('return_date')->nullable();
            $table->double('penalty',10,2)->nullable();
            $table->integer('status')->default('1')->comment('0 Lost, 1 Issued, 2 Returned');
            $table->bigInteger('issued_by')->unsigned()->nullable();
            $table->bigInteger('received_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('member_id')
                    ->references('id')->on('library_members')
                    ->onDelete('cascade');
            $table->foreign('book_id')
                    ->references('id')->on('books')
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
        Schema::dropIfExists('issue_returns');
    }
}
