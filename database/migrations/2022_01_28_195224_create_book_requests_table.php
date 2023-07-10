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
        Schema::create('book_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->string('code')->nullable();
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->string('edition')->nullable();
            $table->string('publish_year')->nullable();
            $table->string('language')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('request_by')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->text('attach')->nullable();
            $table->integer('status')->default('1')->comment('0 Rejected, 1 Pending, 2 Progress, 3 Approved');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('category_id')
                  ->references('id')->on('book_categories')
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
        Schema::dropIfExists('book_requests');
    }
};
