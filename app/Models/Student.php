<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ContentNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'registration_no', 'batch_id', 'program_id', 'admission_date', 'first_name', 'last_name', 'father_name', 'mother_name', 'father_occupation', 'mother_occupation', 'father_photo', 'mother_photo', 'email', 'password', 'password_text', 'country', 'present_province', 'present_district', 'present_village', 'present_address', 'permanent_province', 'permanent_district', 'permanent_village', 'permanent_address', 'gender', 'dob', 'phone', 'emergency_phone', 'religion', 'caste', 'mother_tongue', 'marital_status', 'blood_group', 'nationality', 'national_id', 'passport_no', 'school_name', 'school_exam_id', 'school_graduation_field', 'school_graduation_year', 'school_graduation_point', 'collage_name', 'collage_exam_id', 'collage_graduation_field', 'collage_graduation_year', 'collage_graduation_point', 'photo', 'signature', 'login', 'status', 'is_transfer', 'created_by', 'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function studentEnrolls()
    {
        return $this->hasMany(StudentEnroll::class, 'student_id');
    }

    public function currentEnroll()
    {
        return $this->hasOne(StudentEnroll::class, 'student_id')->ofMany([
            'id' => 'max',
        ], function ($query) {
            $query->where('status', '1');
        });
    }

    public function relatives()
    {
        return $this->hasMany(StudentRelative::class, 'student_id', 'id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'student_id', 'id');
    }

    public function leaves()
    {
        return $this->hasMany(StudentLeave::class, 'student_id', 'id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'student_id', 'id');
    }

    public function presentProvince()
    {
        return $this->belongsTo(Province::class, 'present_province');
    }

    public function presentDistrict()
    {
        return $this->belongsTo(District::class, 'present_district');
    }

    public function permanentProvince()
    {
        return $this->belongsTo(Province::class, 'permanent_province');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district');
    }

    public function statuses()
    {
        return $this->belongsToMany(StatusType::class, 'status_type_student', 'student_id', 'status_type_id');
    }

    public function studentTransfer()
    {
        return $this->hasOne(StudentTransfer::class, 'student_id');
    }

    public function transferCreadits()
    {
        return $this->hasMany(TransferCreadit::class, 'student_id');
    }
    

    // Polymorphic relations
    public function documents()
    {
        return $this->morphToMany(Document::class, 'docable');
    }

    public function contents()
    {
        return $this->morphToMany(Content::class, 'contentable');
    }

    public function notices()
    {
        return $this->morphToMany(Notice::class, 'noticeable');
    }

    public function member()
    {
        return $this->morphOne(LibraryMember::class, 'memberable');
    }

    public function hostelRoom()
    {
        return $this->morphOne(HostelMember::class, 'hostelable');
    }

    public function transport()
    {
        return $this->morphOne(TransportMember::class, 'transportable');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    // Get Current Enroll
    public static function enroll($id)
    {
        $enroll = StudentEnroll::where('student_id', $id)
                                ->where('status', '1')
                                ->orderBy('id', 'desc')
                                ->first();

        return $enroll;
    }
}
