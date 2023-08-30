<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ExamRoutine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_type_id', 'session_id', 'program_id', 'semester_id', 'section_id', 'subject_id', 'date', 'start_time', 'end_time', 'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'exam_routine_user', 'exam_routine_id', 'user_id');
    }

    public function rooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'exam_routine_room', 'exam_routine_id', 'room_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
