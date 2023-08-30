<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Assignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faculty_id', 'program_id', 'session_id', 'semester_id', 'section_id', 'subject_id', 'title', 'description', 'total_marks', 'start_date', 'end_date', 'attach', 'status', 'assign_by',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id', 'id');
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

    public function teacher()
    {
        return $this->belongsTo(User::class, 'assign_by', 'id');
    }

    public function students()
    {
        return $this->hasMany(StudentAssignment::class, 'assignment_id', 'id');
    }
}
