<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_enroll_id', 'subject_id', 'exam_type_id', 'attendance', 'marks', 'achieve_marks', 'contribution', 'note', 'status', 'created_by', 'updated_by',
    ];

    public function studentEnroll()
    {
        return $this->belongsTo(StudentEnroll::class, 'student_enroll_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function type()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id');
    }
}
