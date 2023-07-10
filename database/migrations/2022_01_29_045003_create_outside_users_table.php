<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsideUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outside_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->text('father_photo')->nullable();
            $table->text('mother_photo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            
            $table->string('country')->nullable();
            $table->integer('present_province')->unsigned()->nullable();
            $table->integer('present_district')->unsigned()->nullable();
            $table->text('present_village')->nullable();
            $table->text('present_address')->nullable();
            $table->integer('permanent_province')->unsigned()->nullable();
            $table->integer('permanent_district')->unsigned()->nullable();
            $table->text('permanent_village')->nullable();
            $table->text('permanent_address')->nullable();

            $table->string('education_level')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('gender')->comment('1 Male, 2 Female & 3 Other');
            $table->date('dob');

            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_no')->nullable();

            $table->text('photo')->nullable();
            $table->text('signature')->nullable();
            $table->integer('status')->default('1')->comment('0 Inactive, 1 Active');
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
        Schema::dropIfExists('outside_users');
    }
}
