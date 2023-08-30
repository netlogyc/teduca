<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesMaster extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'faculty_id', 'program_id', 'session_id', 'semester_id', 'section_id', 'amount', 'type', 'assign_date', 'due_date', 'status', 'created_by', 'updated_by',
    ];

    public function studentEnrolls()
    {
        return $this->belongsToMany(StudentEnroll::class, 'fees_master_student_enroll', 'fees_master_id', 'student_enroll_id');
    }

    public function category()
    {
        return $this->belongsTo(FeesCategory::class, 'category_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
