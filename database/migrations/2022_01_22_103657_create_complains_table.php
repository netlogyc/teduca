<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id')->unsigned();
            $table->integer('source_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('date');
            $table->text('action_taken')->nullable();
            $table->string('assigned')->nullable();
            $table->text('issue')->nullable();
            $table->text('note')->nullable();
            $table->text('attach')->nullable();
            $table->integer('status')->default('1')->comment('0 Rejected, 1 Pending, 2 Progress, 3 Resolved');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('type_id')
                    ->references('id')->on('complain_types')
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
        Schema::dropIfExists('complains');
    }
}
