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
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_no')->nullable();
            $table->integer('batch_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->date('apply_date')->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->text('father_photo')->nullable();
            $table->text('mother_photo')->nullable();

            $table->string('country')->nullable();
            $table->integer('present_province')->unsigned()->nullable();
            $table->integer('present_district')->unsigned()->nullable();
            $table->text('present_village')->nullable();
            $table->text('present_address')->nullable();
            $table->integer('permanent_province')->unsigned()->nullable();
            $table->integer('permanent_district')->unsigned()->nullable();
            $table->text('permanent_village')->nullable();
            $table->text('permanent_address')->nullable();

            $table->integer('gender')->comment('1 Male, 2 Female & 3 Other');
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('emergency_phone')->nullable();
            
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_no')->nullable();

            $table->text('school_name')->nullable();
            $table->string('school_exam_id')->nullable();
            $table->string('school_graduation_field')->nullable();
            $table->string('school_graduation_year')->nullable();
            $table->string('school_graduation_point')->nullable();
            $table->text('collage_name')->nullable();
            $table->string('collage_exam_id')->nullable();
            $table->string('collage_graduation_field')->nullable();
            $table->string('collage_graduation_year')->nullable();
            $table->string('collage_graduation_point')->nullable();
            
            $table->text('photo')->nullable();
            $table->text('signature')->nullable();

            $table->integer('status')->default('1')->comment('0 Rejected, 1 Pending, 2 Approve');
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
        Schema::dropIfExists('applications');
    }
};
