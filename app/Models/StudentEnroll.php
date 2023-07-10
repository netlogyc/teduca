<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentEnroll extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'program_id', 'session_id', 'semester_id', 'section_id', 'status', 'created_by', 'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
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

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_enroll_subject', 'student_enroll_id', 'subject_id');
    }

    public function attendances()
    {
        return $this->hasMany(StudentAttendance::class, 'student_enroll_id', 'id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'student_enroll_id', 'id');
    }

    public function subjectMarks()
    {
        return $this->hasMany(SubjectMarking::class, 'student_enroll_id', 'id');
    }

    public function assignments()
    {
        return $this->hasMany(StudentAssignment::class, 'student_enroll_id', 'id');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'student_enroll_id', 'id');
    }
}
