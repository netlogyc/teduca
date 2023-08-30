<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectMarking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_enroll_id', 'subject_id', 'exam_marks', 'attendances', 'assignments', 'activities', 'total_marks', 'publish_date', 'publish_time', 'status', 'created_by', 'updated_by',
    ];

    public function studentEnroll()
    {
        return $this->belongsTo(StudentEnroll::class, 'student_enroll_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
