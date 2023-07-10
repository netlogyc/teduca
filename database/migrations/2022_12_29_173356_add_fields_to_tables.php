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
        Schema::table('students', function (Blueprint $table) {
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->text('father_photo')->nullable();
            $table->text('mother_photo')->nullable();
            $table->string('country')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('school_exam_id')->nullable()->change();
            $table->string('school_graduation_field')->nullable();
            $table->string('school_graduation_year')->nullable()->change();
            $table->string('collage_exam_id')->nullable()->change();
            $table->string('collage_graduation_field')->nullable();
            $table->string('collage_graduation_year')->nullable()->change();
        });

        Schema::table('student_relatives', function (Blueprint $table) {
            $table->renameColumn('designation', 'occupation');
            $table->renameColumn('organization', 'email');
            $table->renameColumn('contact', 'phone');
            $table->text('address')->nullable();
            $table->text('photo')->nullable();
        });

        Schema::table('outside_users', function (Blueprint $table) {
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->text('father_photo')->nullable();
            $table->text('mother_photo')->nullable();
            $table->string('country')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
        });

        Schema::table('fees_masters', function (Blueprint $table) {
            $table->integer('type')->default('1')->comment('1 Fixed, 2 Per Credit');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('country')->nullable();
            $table->text('epf_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('father_occupation');
            $table->dropColumn('mother_occupation');
            $table->dropColumn('father_photo');
            $table->dropColumn('mother_photo');
            $table->dropColumn('country');
            $table->dropColumn('religion');
            $table->dropColumn('caste');
            $table->dropColumn('school_graduation_field');
            $table->dropColumn('collage_graduation_field');
        });

        Schema::table('student_relatives', function (Blueprint $table) {
            $table->dropColumn('occupation');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('photo');
        });

        Schema::table('outside_users', function (Blueprint $table) {
            $table->dropColumn('father_occupation');
            $table->dropColumn('mother_occupation');
            $table->dropColumn('father_photo');
            $table->dropColumn('mother_photo');
            $table->dropColumn('country');
            $table->dropColumn('religion');
            $table->dropColumn('caste');
        });

        Schema::table('fees_masters', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('religion');
            $table->dropColumn('caste');
            $table->dropColumn('country');
            $table->dropColumn('epf_no');
        });
    }
};
