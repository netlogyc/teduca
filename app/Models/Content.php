<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faculty_id', 'program_id', 'session_id', 'semester_id', 'section_id', 'type_id', 'title', 'description', 'date', 'url', 'attach', 'status', 'created_by', 'updated_by',
    ];

    public function type()
    {
        return $this->belongsTo(ContentType::class, 'type_id', 'id');
    }

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

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    // Polymorphic relations
    public function users()
    {
        return $this->morphedByMany(User::class, 'contentable');
    }

    public function students()
    {
        return $this->morphedByMany(Student::class, 'contentable');
    }
}
