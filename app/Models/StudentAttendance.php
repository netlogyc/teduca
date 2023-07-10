<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_enroll_id', 'subject_id', 'date', 'time', 'attendance', 'note', 'created_by', 'updated_by',
    ];

    public function studentEnroll()
    {
        return $this->belongsTo(StudentEnroll::class, 'student_enroll_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
