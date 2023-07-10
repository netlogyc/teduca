<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faculty_id', 'title', 'slug', 'shortcode', 'registration', 'status',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'batch_program', 'program_id', 'batch_id');
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'program_semester', 'program_id', 'semester_id');
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'program_session', 'program_id', 'session_id');
    }

    public function semesterSections()
    {
        return $this->hasMany(ProgramSemesterSection::class, 'program_id', 'id');
    }

    public function studentEnrolls()
    {
        return $this->hasMany(StudentEnroll::class, 'program_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'program_subject', 'program_id', 'subject_id');
    }

    public function rooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'program_class_room', 'program_id', 'class_room_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'program_id', 'id');
    }

    public function classes()
    {
        return $this->hasMany(ClassRoutine::class, 'program_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_program', 'program_id', 'user_id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class, 'program_id', 'id');
    }
}
