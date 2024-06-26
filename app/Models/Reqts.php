<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqts extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'registration_no', 'batch_id', 'program_id', 'admission_date', 'first_name', 'last_name', 'father_name', 'mother_name', 'father_occupation', 'mother_occupation', 'father_photo', 'mother_photo', 'email', 'password', 'password_text', 'country', 'present_province', 'present_district', 'present_village', 'present_address', 'permanent_province', 'permanent_district', 'permanent_village', 'permanent_address', 'gender', 'dob', 'phone', 'emergency_phone', 'religion', 'caste', 'mother_tongue', 'marital_status', 'blood_group', 'nationality', 'national_id', 'passport_no', 'school_name', 'school_exam_id', 'school_graduation_field', 'school_graduation_year', 'school_graduation_point', 'collage_name', 'collage_exam_id', 'collage_graduation_field', 'collage_graduation_year', 'collage_graduation_point', 'photo', 'signature', 'login', 'status', 'is_transfer', 'created_by', 'updated_by',
    ];
}
